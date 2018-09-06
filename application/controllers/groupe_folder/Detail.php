<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail extends MY_User_Controller {

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->load->model('Invitation_ug', 'invitation');
		
	}

	# @id = id groupe
	public function index($id = null)
	{   
		# js, charger l'image en ajax
		//$this->theme->js('custom_image_getter');
		
		# informations du groupe
		$Groupe_detail 		 		= $this->groupes->get($id);
		$Groupe_detail->membres 	= $this->user_groupes->getUsersGroupe($id);
		$admin 		  		 		= $this->isAdminOfGroup($id);

		# on charge le formulaire de recherche d'utilisateur
		$getSearchUserForm 		    = getSearchUserForm();
		$getUpdateGroupeForm		= getUpdateGroupeForm($Groupe_detail);


		$invitationsGroupe = $this->invitation
		->with_groupe()
		->with_user_invit()
		->where('groupes_id', $id)
		->get_all();

		# si il ne fait pas partis du groupe
		if($admin === false) {	
			$this->error_message = "Vous n'étes pas membre du groupe"; 
            $error_message_type = VALIDATION_MESSAGE_ERROR;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return redirect('/user/groupe/recherche');
		}

		# templating
		$this->theme->data('invitationsGroupe', $invitationsGroupe);
		$this->theme->data('getUpdateGroupeForm', $getUpdateGroupeForm);
		$this->theme->data('getSearchUserForm', $getSearchUserForm);
		$this->theme->data('admin', $admin);
		$this->theme->data('groupe_detail' ,$Groupe_detail);
		$this->render('users/groupe_detail');
	}


	# supprimer un user d'un groupe 
	public function supprimer($id_user, $id_groupe)
	{
		$admin = $this->isAdminOfGroup($id_groupe);
		# si il ne fait pas partis du groupe
		if($admin === false) {	
			$this->error_message = "Vous n'étes pas membre du groupe"; 
            $error_message_type = VALIDATION_MESSAGE_ERROR;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return $this->index();
		}

		if($this->user_groupes->delete([
			'user_id' => $id_user,
			'groupes_id' => $id_groupe ]))
		{
			$this->error_message = "L'utilisateur à bien été supprimer"; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return $this->index($id_groupe);		
		}else {
			$this->error_message = "Une erreur c'est produite durant la suppression de l'utilisateur"; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return $this->index($id_groupe);				
		}
	}

	// on crée une invitation du coter user (cette fonction n'a rien à faire la... mais bon elle est au dessus de ça soeur)
	# @id = id du groupe
	# todo Faire une fonction de vérification 
	public function invitation($id = null){
		

		if(isset($id) && !empty($id))
		{

			$tabInvitation['user_id']		= intval($this->session->userdata('user'));
			$tabInvitation['groupes_id']    = intval($id);
			$tabInvitation['type'] 			= INVITATION_TYPE_USER; 
			$tabInvitation['status'] 		= INVITATION_STATUS_PENDING;

			if($this->invitation->insert($tabInvitation))
			{
			$this->error_message = "Votre demande à bien été envoyée."; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return redirect('/user/groupe/recherche');
			}

			$this->error_message = "Une erreur c'est produite durant votre demande..."; 
            $error_message_type = VALIDATION_MESSAGE_ERROR;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			return redirect('/user/groupe/recherche');
		}else {
			return redirect('/user/groupe/recherche');
		}
	}

	# on crée une invitation du coté groupe
	# faire une fonction de vérification
	public function invitationGroupe($id = null)
	{
		$getSearchUserForm	= getSearchUserForm(false);
		$this->form_validation->set_rules($getSearchUserForm);		

		if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
                $error_message_type = VALIDATION_MESSAGE_ERROR;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);

				redirect('/user/groupe/'.$id);
            }
           else
            {
            	$userObj = $this->my_user->where('user_nom', $this->input->post('nom'))->get();
            	# todo tester si le user est deja membre.
            	if(!empty($userObj))
            	{
             		return $this->inviteUser($id, $userObj->user_id);
            	}else {
            		$this->error_message .= 'l\'utilisateur n\'existe pas';
               		$error_message_type = VALIDATION_MESSAGE_ERROR;    
                	$this->session->set_userdata('error_message', $this->error_message);
                	$this->session->set_userdata('error_message_type', $error_message_type);

				redirect('/user/groupe/'.$id);
            	}
            }

		redirect('/user/groupe/'.$id);
	}

	# finalisation de l'entrée de bdd du coter groupe apres verifications
	public function inviteUser($idGroupe, $idUser)
	{

		$tabInvitation['user_id']		= intval($idUser);
		$tabInvitation['groupes_id']    = intval($idGroupe);
		$tabInvitation['type'] 			= INVITATION_TYPE_GROUPE; 
		$tabInvitation['status'] 		= INVITATION_STATUS_PENDING;

		if($this->invitation->insert($tabInvitation)){
					$this->error_message .= 'l`\'invitation à bien été envoyée. ';
               		$error_message_type = VALIDATION_MESSAGE;    
                	$this->session->set_userdata('error_message', $this->error_message);
                	$this->session->set_userdata('error_message_type', $error_message_type);
		}else{
					$this->error_message .= 'Une erreur c\'est produite durant l\'envois de l\'invitation. ';
               		$error_message_type = VALIDATION_MESSAGE_ERROR;    
                	$this->session->set_userdata('error_message', $this->error_message);
                	$this->session->set_userdata('error_message_type', $error_message_type);
		}
		return redirect('/user/groupe/'.$idGroupe);
		
	}

}

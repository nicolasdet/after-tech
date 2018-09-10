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
		
		# informations du groupe
		$Groupe_detail 		 		= $this->groupes->get($id);
		$Groupe_detail->membres 	= $this->user_groupes->getUsersGroupe($id);
		$admin 		  		 		= $this->isAdminOfGroup($id);

		# on charge les formulaires
		$getSearchUserForm 		    = getSearchUserForm();
		$getUpdateGroupeForm		= getUpdateGroupeForm($Groupe_detail);
		$getCreateEventForm			= getCreateEventForm();			


		$invitationsGroupe = $this->invitation
		->with_groupe()
		->with_user_invit()
		->where('groupes_id', $id)
		->get_all();

		# si il ne fait pas partis du groupe
		if($admin === false) {	
			$this->flash->setFlash("Vous n'étes pas membre du groupe", VALIDATION_MESSAGE_ERROR);
			return redirect('/user/groupe/recherche');
		}

		# templating
		$this->theme->data('getCreateEventForm', $getCreateEventForm);
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
			$this->flash->setFlash("Vous n'étes pas membre du groupe", VALIDATION_MESSAGE_ERROR);
			return $this->index();
		}

		if($this->user_groupes->delete([
			'user_id' => $id_user,
			'groupes_id' => $id_groupe ]))
		{
			$this->flash->setFlash("L'utilisateur à bien été supprimer", VALIDATION_MESSAGE);
			return $this->index($id_groupe);		
		}else {
		$this->flash->setFlash("Une erreur c'est produite durant la suppression de l'utilisateur", VALIDATION_MESSAGE_ERROR);
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
				$this->flash->setFlash("Votre demande à bien été envoyée.", VALIDATION_MESSAGE);
				return redirect('/user/groupe/recherche');
			}

            $this->flash->setFlash("Une erreur c'est produite durant votre demande...", VALIDATION_MESSAGE_ERROR);
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
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE);

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
            		$this->flash->setFlash("l\'utilisateur n\'existe pas", VALIDATION_MESSAGE_ERROR);
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
                	$this->flash->setFlash("l`\'invitation à bien été envoyée.", VALIDATION_MESSAGE);
		}else{
					$this->error_message .= 'Une erreur c\'est produite durant l\'envois de l\'invitation. ';
                	$this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
		}
		return redirect('/user/groupe/'.$idGroupe);
		
	}

}

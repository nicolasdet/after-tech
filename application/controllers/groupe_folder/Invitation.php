<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invitation extends MY_User_Controller {

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->load->model('Invitation_ug', 'invitation');
	}



	public function index($id = null)
	{   # on recupere la liste des invitations du User et les info du groupe associer.
		$listeInvitations = $this->invitation
		->with_groupe()
		->where(array(
			'user_id' => $this->session->userdata('user'),
			'status >' => 0
		))
		->get_all();

		$this->theme->data('listeInvitations', $listeInvitations );
		$this->render('users/groupe_inscription');
	}

	#### todo - verifications ###
	# User accepte invitation on l'insere dans le groupe puis supprime l'invitation
	# @id = id groupe
	public function ok($id = null)
	{
		if(!empty($id))
		{	
			$dataUserGroupe['user_id'] 		= $this->session->userdata('user');
			$dataUserGroupe['groupes_id']	= $id;
			if($this->user_groupes->insert($dataUserGroupe) !== false){

				$this->error_message .= 'Vous faite maintenent partis du groupe';
                $error_message_type = VALIDATION_MESSAGE;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);

                return $this->annule($id, 'user/groupe/'.$id);
			}else {

 				$this->error_message .= 'Une erreur c\'est produite';
                $error_message_type = VALIDATION_MESSAGE_ERROR;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);
			}
		}

		return redirect("/user/groupe/invitation");
	}


	
	

	# Suppression d'une invitation 
	# @id = id groupe     @redir = redirection au return
	public function annule($id = null, $redir = null)
	{
		if(!empty($id))
		{
			$this->invitation->where(array('groupes_id' => $id, 'user_id' => $this->session->userdata('user')))->delete();
		}

		if($redir){
			return redirect($redir);
		}
		return redirect("/user/groupe/invitation");
	}
}

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
	public function ok($id = null, $id_user = null)
	{
		if(!empty($id_user))
		{
			$dataUserGroupe['user_id'] 		= $id_user;
			$dataUserGroupe['groupes_id']	= $id;

			if($this->user_groupes->insert($dataUserGroupe) !== false){

                $this->flash->setFlash("Vous avez accepter l\'utilisateur", VALIDATION_MESSAGE);

                return $this->annule($id, 'user/groupe/'.$id, $id_user);
                
			}else {

                $this->flash->setFlash("Une erreur c\'est produite", VALIDATION_MESSAGE_ERROR);
			}

			return redirect("/user/groupe/".$id);
		}


		if(!empty($id))
		{	
			$dataUserGroupe['user_id'] 		= $this->session->userdata('user');
			$dataUserGroupe['groupes_id']	= $id;
			if($this->user_groupes->insert($dataUserGroupe) !== false){

                $this->flash->setFlash("Vous faite maintenent partis du groupe", VALIDATION_MESSAGE);

                return $this->annule($id, 'user/groupe/'.$id);
			}else {

                $this->flash->setFlash("Une erreur c\'est produite", VALIDATION_MESSAGE_ERROR);
			}
		}

		return redirect("/user/groupe/invitation");
	}


	
	

	# Suppression d'une invitation 
	# @id = id groupe     @redir = redirection au return
	public function annule($id = null, $redir = null, $id_user = null)
	{	
		# on pourrais faire 'user_id' => !empty($id_user) ? $id_user ? $this->session->userdata('user')
		# mais j'aime bien les if else c'est plus joli.... non en réalite ça laisse plus de possibiliter pour de futur modif
		if(!empty($id_user))
		{
			$this->invitation->where(array('groupes_id' => $id, 'user_id' => $id_user))->delete();
		}
		else if(!empty($id))
		{
			$this->invitation->where(array('groupes_id' => $id, 'user_id' => $this->session->userdata('user')))->delete();
		}

		if($redir){
			return redirect($redir);
		}
		return redirect("/user/groupe/invitation");
	}
}

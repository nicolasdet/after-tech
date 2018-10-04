<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Join extends MY_User_Controller {

	# $id de l'entreprise
	public function index($id = null)
	{       
		$idUser 			= $this->session->userdata('user');

		$tabEntrepriseUser['user_id']		= $this->session->userdata('user');
		$tabEntrepriseUser['entreprise_id'] = $id;

		if($this->entreprise_user->insert($tabEntrepriseUser)){

			$this->flash->setFlash("Felicitation", VALIDATION_MESSAGE);
			redirect('user/entreprise/'.$id);
			exit();

		}else {

			$this->entreprise->delete($id);
			$this->flash->setFlash("erreur de l'ajout de l'entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user/entreprise/search');
			exit();
		}

	}
}

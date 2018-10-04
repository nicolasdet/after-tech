<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quit extends MY_User_Controller {

	# $id de l'entreprise
	public function index($id = null)
	{       
		$idUser 		 = $this->session->userdata('user');
		$entreprise_id	 = $id;

		if($this->entreprise_user->where(['user_id' => $idUser, 'entreprise_id' => $entreprise_id])->delete()){

			$this->flash->setFlash("Vous avez bien quitter votre entreprise", VALIDATION_MESSAGE);
			redirect('user');
			exit();

		}else {

			$this->entreprise->delete($id);
			$this->flash->setFlash("Une erreur est survenue", VALIDATION_MESSAGE_ERROR);
			redirect('user');
			exit();
		}

	}
}

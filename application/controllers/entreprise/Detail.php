<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_User_Controller {

	# $id de l'evenement
	public function index($id = null)
	{       

		$idUser 			= $this->session->userdata('user');

		if(!$this->entreprise_user->isMember($idUser)){
			$this->flash->setFlash("vous n'ete pas m'embre de l'entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user');
			exit();
		}

		$entreprise = $this->entreprise->get($id);

		$data = array(
			'idUser' 		=> $idUser,
			'entreprise'	=> $entreprise
		);
		$this->render('entreprises/detail', $data);
	}

	public function getByUser(){

		$entrepriseUser = $this->entreprise_user->where(['user_id' => $this->session->userdata('user')])->get();

		if($entrepriseUser == false){
			$this->flash->setFlash("vous n'avez pas d'entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user');
			exit();
		}

		$idEntreprise = $entrepriseUser->entreprise_id;
		$this->index($idEntreprise);
	}
}

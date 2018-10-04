<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_User_Controller {

	public function index($id = null)
	{       

		$this->theme->js('entrepriseSearch');
		
		$idUser 			= $this->session->userdata('user');
		$entrepriseUser 	= $this->entreprise_user->where(['user_id' => $this->session->userdata('user')])->get();

		if($entrepriseUser != false){
			$entrepriseUser = true;
		}

		$data = array(
			'idUser' 		=> $idUser,
		);

		$this->theme->data('entrepriseUser', $entrepriseUser);
		$this->render('entreprises/search', $data);
	}
}
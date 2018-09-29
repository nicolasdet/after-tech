<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_User_Controller {

	public function index($id = null)
	{       
		$this->load->model('message');

		$idUser 		= $this->session->userdata('user');
		$listGroupes 	= $this->user_groupes->getByUserAndAdminCount($this->session->userdata('user'));
		$listeMessages	= $this->message->loadByUserIdCount($this->session->userdata('user'));
		$Events 		= $this->

		$data = array(
			'idUser' 		=> $idUser,
			'listGroupes'	=> $listGroupes,
			'listeMessages' => $listeMessages
		);

		$this->render('users/landing', $data);
	}

}

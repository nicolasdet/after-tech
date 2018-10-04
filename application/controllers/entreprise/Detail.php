<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends MY_User_Controller {

	public function index($id = null)
	{       

		$idUser 			= $this->session->userdata('user');

		$data = array(
			'idUser' 		=> $idUser,
		);

		$this->render('entreprises/detail', $data);
	}
}

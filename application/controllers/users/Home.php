<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends MY_User_Controller {



	public function index($id = null)
	{       

		//var_dump('ici');
		$idUser = $this->session->userdata('user');

		
		$this->theme->data('idUser', $idUser);
		$this->render('users/landing');
	}

}

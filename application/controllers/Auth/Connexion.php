<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends MY_Controller {



	public function index($id = null)
	{       


		$this->render('users/landing');
	}
}

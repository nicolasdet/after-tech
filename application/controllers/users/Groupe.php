<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Groupe extends MY_User_Controller {



	public function index($id = null)
	{       


		$this->render('users/groupe');
	}

}

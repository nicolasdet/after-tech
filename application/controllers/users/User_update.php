<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_update extends MY_User_Controller {



	public function index($id = null)
	{       


		$this->render('users/update');
	}

}

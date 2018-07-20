<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends User_controller {

	public function index($num = null)
	{	
		$this->render('users/landing');
	}


}

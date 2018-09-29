<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends MY_Admin_Controller {



	public function index($id = null)
	{       

		$this->render('admin/landing');
	}

}

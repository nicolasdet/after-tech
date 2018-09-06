<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Groupe_controller extends MY_User_Controller {



	public function index($id = null)
	{       
		//$this->theme->js('custom_image_getter');
		$listGroupes = $this->user_groupes->getByUserAndAdmin($this->session->userdata('user'));

		$this->theme->data('listGroupes', $listGroupes);
		$this->render('users/groupe');
	}

}

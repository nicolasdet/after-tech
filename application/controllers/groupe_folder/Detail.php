<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail extends MY_User_Controller {



	public function index($id = null)
	{       
		$this->theme->js('custom_image_getter');
		
		$Groupe_detail = $this->groupes->get($id);
		$admin 		   = $this->user_groupes->isAdmin($id, $this->session->userdata('user'));

		if($admin === false) 
			redirect('/user/groupe');

		$this->theme->data('admin', $admin);
		$this->theme->data('groupe_detail' ,$Groupe_detail);
		$this->render('users/groupe_detail');
	}

}

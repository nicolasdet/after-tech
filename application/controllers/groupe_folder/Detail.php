<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Detail extends MY_User_Controller {



	public function index($id = null)
	{       
		$this->theme->js('custom_image_getter');
		
		$Groupe_detail = $this->groupes->get($id);
		$admin 		   = $this->user_groupes->isAdmin($id, $this->session->userdata('user'));

		if($admin === false) {	
			$this->error_message = "Vous n'étes pas membre du groupe"; 
            $error_message_type = VALIDATION_MESSAGE_ERROR;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
			redirect('/user/groupe/recherche');
		}

		$this->theme->data('admin', $admin);
		$this->theme->data('groupe_detail' ,$Groupe_detail);
		$this->render('users/groupe_detail');
	}

}

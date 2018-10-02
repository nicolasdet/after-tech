<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {


	public function index($id = null)
	{       
		if($this->session->userdata('loged') || $this->session->userdata('user') )
		{
			redirect('/user');
		}
		
		$InscriptionFormData = getInscriptionForm();
		$LoginFormData		 = getConnexionForm();

		$this->cache_config();


		$this->theme->data('InscriptionFormData', $InscriptionFormData);
		$this->theme->data('LoginFormData', $LoginFormData);
		$this->render('welcome_message');
	}

	private function cache_config()
	{
		$this->output->set_header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0", false);
		$this->output->set_header("Pragma: no-cache"); 
	}
}

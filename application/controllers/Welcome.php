<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {



	public function index($id = null)
	{       
		
		$this->load->helper('custom_form');
		$InscriptionFormData = getInscriptionForm();
		$LoginFormData		 = getConnexionForm();

		$this->theme->data('InscriptionFormData', $InscriptionFormData);
		$this->theme->data('LoginFormData', $LoginFormData);
		$this->render('welcome_message');
	}
}

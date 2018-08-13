<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MY_Controller {



	public function index($id = null)
	{       
		 $this->load->model('User', 'user');
		 $this->load->helper('security', 'secure_inscription');

		 $confirmationData = getInscriptionForm(false);

		 $this->form_validation->set_rules($confirmationData);
		
		if ($this->form_validation->run() == FALSE)
             {			
             	$error_message = validation_errors();
             	$this->session->set_userdata('error_message', $error_message);

				redirect('/');
             }
             else
             {
             	$this->createUser();
                // redirect('/user');
             }

		//$this->render('users/landing');
	}


	private function createUser(){

		
		exit('createuser');
	}
}

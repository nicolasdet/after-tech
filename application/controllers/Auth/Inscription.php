<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MY_Controller {



	public function index($id = null)
	{       

		 $confirmationData = getInscriptionForm(false);
		 $this->form_validation->set_rules($confirmationData);
		
		if ($this->form_validation->run() == FALSE)
             {			

             	/*
					particulier, trouver comment isoler ce bout de code. Je penche pour la librairie
             	*/
             	$InscriptionFormData = getInscriptionForm();
				$LoginFormData		 = getConnexionForm();
				$this->theme->data('InscriptionFormData', $InscriptionFormData);
				$this->theme->data('LoginFormData', $LoginFormData);
             	$this->render('welcome_message');
             }
             else
             {
                        exit('ok');
             }

		

		//$this->render('users/landing');
	}
}

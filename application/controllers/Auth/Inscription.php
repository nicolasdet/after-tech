<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MY_Controller {



	public function index($id = null)
	{       




		 $confirmationData = getInscriptionForm(false);
		 $this->form_validation->set_rules($confirmationData);
		
		if ($this->form_validation->run() == FALSE)
             {			
             	$this->render('welcome_message');
             	//redirect('/');
                //        exit('faux');
             }
             else
             {
                        exit('ok');
              }

		

		//$this->render('users/landing');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends MY_Controller {



	public function index($id = null)
	{       
		$this->load->model('User', 'user');
		$this->load->helper('security', 'secure_inscription');

		 $confirmationData = getConnexionForm(false);
		 $this->form_validation->set_rules($confirmationData);


		    if ($this->form_validation->run() == FALSE)
            {   
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				redirect('/');
            }
            else
            {
             	$this->login();
            }

		redirect('/');
	}

	private function login()
	{

		$tabUser['user_email']    = $this->input->post('email');
        $tabUser['user_password'] = $this->input->post('password');

        $user = $this->user->connectUser($tabUser);
        if(!empty($user)){

        	$this->session->set_userdata('loged', true);
        	$this->session->set_userdata('user', $user);
        	redirect('/user');
        }
         $this->flash->setFlash("Erreur d'email ou de mot de passe.", VALIDATION_MESSAGE_ERROR);
         return  redirect('/');
	}
}

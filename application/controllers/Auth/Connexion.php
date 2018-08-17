<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends MY_Controller {



	public function index($id = null)
	{       
		$this->load->model('User', 'user');
		$this->load->helper('security', 'secure_inscription');

		 $confirmationData = getConnexionForm(false);
		 $this->form_validation->set_rules($confirmationData);

		 	$error_message = "";  
		    if ($this->form_validation->run() == FALSE)
            {   


                $error_message .= validation_errors();

                $error_message_type = VALIDATION_MESSAGE_ERROR;            
                $this->session->set_userdata('error_message', $error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);
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

         $error_message = "Erreur d'email ou de mot de passe."; 
         $error_message_type = VALIDATION_MESSAGE_ERROR;

         $this->session->set_userdata('error_message', $error_message);
         $this->session->set_userdata('error_message_type', $error_message_type);
         return  redirect('/');
	}
}

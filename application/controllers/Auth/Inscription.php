<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MY_Controller {


	public function index($id = null)
	{       
		 $this->load->model('User', 'user');
		 $this->load->helper('security', 'secure_inscription');

		 $confirmationData = getInscriptionForm(false);
		 $this->form_validation->set_rules($confirmationData);

 
         $this->error_check_email();
        
        if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {   


                $this->error_message .= validation_errors();

                $error_message_type = VALIDATION_MESSAGE_ERROR;            
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);
				redirect('/');
            }
            else
            {
             	$this->createUser();
            }

	}


	private function createUser(){

		$tabUser['user_nom']      = $this->input->post('nom');
        $tabUser['user_prenom']   = $this->input->post('prenom');
        $tabUser['user_email']    = $this->input->post('email');
        $tabUser['user_password'] = $this->input->post('password');
        $tabUser['user_status']   = 1;



        if($this->user->createUser($tabUser)){

            $this->error_message = "Votre compte à bien ete crée."; 
            $error_message_type = VALIDATION_MESSAGE;

            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
            return redirect('/');
        }


         $this->error_message = "Problem lors de l'ajout utilisateur."; 
         $this->session->set_userdata('error_message', $this->error_message);
         return  redirect('/');
        

	}
}

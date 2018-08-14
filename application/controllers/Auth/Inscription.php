<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription extends MY_Controller {


	public function index($id = null)
	{       
		 $this->load->model('User', 'user');
		 $this->load->helper('security', 'secure_inscription');

		 $confirmationData = getInscriptionForm(false);
		 $this->form_validation->set_rules($confirmationData);


        $error_message = "";  
        if(!$this->user->match_email($this->input->post('email')))
            {
                    $error_message .= "l'email existe deja.";
            }
        
        if ($this->form_validation->run() == FALSE || $error_message != "")
            {   


                $error_message .= validation_errors();

                $error_message_type = VALIDATION_MESSAGE_ERROR;            
                $this->session->set_userdata('error_message', $error_message);
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

            $error_message = "Votre compte à bien ete crée."; 
            $error_message_type = VALIDATION_MESSAGE;

            $this->session->set_userdata('error_message', $error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);
            return redirect('/');
        }


         $error_message = "Problem lors de l'ajout utilisateur."; 
         $this->session->set_userdata('error_message', $error_message);
         return  redirect('/');
        

	}
}

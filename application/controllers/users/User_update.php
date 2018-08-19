<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class User_update extends MY_User_Controller {



	public function index($id = null)
	{       
		$UpdateUserForm		 	= getUpdateUserForm($this->user);
		$UpdateUserPasswordForm = getUpdateUserPasswordForm();

		$this->theme->data('UpdateUserPasswordForm', $UpdateUserPasswordForm);
		$this->theme->data('UpdateUserForm', $UpdateUserForm);
		$this->render('users/update');
	}

	public function profile()
	{
		$ConfirmationUpdateUserForm	= getUpdateUserForm($this->user, false);
		$this->form_validation->set_rules($ConfirmationUpdateUserForm);


		if($this->input->post('email') != $this->user->user_email)
			$this->error_check_email();
		 
		 if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
                $error_message_type = VALIDATION_MESSAGE_ERROR;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);

				return $this->index();
            }
           else
            {
             	return $this->updateUser();
            }

		redirect('/user/update');
	}

	public function password()
	{
		$ConfirmationUpdateUserForm	= getUpdateUserPasswordForm(false);
		$this->form_validation->set_rules($ConfirmationUpdateUserForm);	

		$this->error_check_samePasswork();

		 if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
                $error_message_type = VALIDATION_MESSAGE_ERROR;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);

				return $this->index();
            }
           else
            {
             	return $this->updateUserPassword();
            }

		redirect('/user/update');
	}

	public function delete()
	{
		
	}

	public function updateUser ()
	{

		$tabUser['user_nom']    = 	$this->input->post('nom');
		$tabUser['user_prenom'] =   $this->input->post('prenom');
		$tabUser['user_email']  = 	$this->input->post('email');


		if($this->my_user->updateUser($tabUser, $this->user->user_id)) {

            $this->error_message = "Votre compte à bien ete modifier"; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);

		}else {

			$error_message_type = VALIDATION_MESSAGE_ERROR;  
			$this->error_message = "Problem lors de la modification de l'utilisateur."; 
		    $this->session->set_userdata('error_message', $this->error_message);
		    $this->session->set_userdata('error_message_type', $error_message_type);
		}


		
		redirect('/user/update');
	}

	public function updateUserPassword()
	{
		$tabUser['user_password']    = 	$this->input->post('new-password');

		if($this->my_user->updateUserPassword($tabUser, $this->user->user_id))
		{
            $this->error_message = "Votre mot de passe à bien ete modifier"; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);			
		}else {

			$error_message_type = VALIDATION_MESSAGE_ERROR;  
			$this->error_message = "Problem lors de la modification du mot de passe."; 
		    $this->session->set_userdata('error_message', $this->error_message);
		    $this->session->set_userdata('error_message_type', $error_message_type);
		}

		redirect('/user/update');
	}

}
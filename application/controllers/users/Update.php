<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Update extends MY_User_Controller {



	public function index($id = null)
	{       
		$UpdateUserForm		 	= getUpdateUserForm($this->user);
		$UpdateUserPasswordForm = getUpdateUserPasswordForm();
		$idUser = $this->session->userdata('user');

		
		$this->theme->data('idUser', $idUser);
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
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

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
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

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

            $this->flash->setFlash("Votre compte à bien ete modifier", VALIDATION_MESSAGE);

		}else {

		    $this->flash->setFlash("Problem lors de la modification de l'utilisateur.", VALIDATION_MESSAGE_ERROR);
		}


		
		redirect('/user/update');
	}

	public function updateUserPassword()
	{
		$tabUser['user_password']    = 	$this->input->post('new-password');

		if($this->my_user->updateUserPassword($tabUser, $this->user->user_id))
		{
            $this->flash->setFlash("Votre mot de passe à bien ete modifier", VALIDATION_MESSAGE);

		}else {

		    $this->flash->setFlash("Problem lors de la modification du mot de passe.", VALIDATION_MESSAGE_ERROR);
		}

		redirect('/user/update');
	}



	 public function do_upload()
        {
                $config['upload_path']          = './public/assets/img/upload/users/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['overwrite']            = true;
                $config['file_name']            = $this->user->user_id;
                
                
                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile'))
                {

                    $error_message_type = VALIDATION_MESSAGE_ERROR;  
		   			$this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

                    redirect('/user/update');
                }
                else
                {
                	$data['user_img'] = $config['upload_path'].$this->upload->data('file_name');
                	$this->my_user->update($data, $this->user->user_id);  

                    redirect('/user/update');
                }
        }

}
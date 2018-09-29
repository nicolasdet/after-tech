<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Gestion extends MY_Admin_Controller {

	private $id;

	public function index($id = null)
	{       
		$allUsers = $this->my_user->where(['user_status' => '1'])->get_all();

		foreach ($allUsers as &$unUser) {

			$unUser->form = getAdminUserUpdateForm(true, $unUser);
		}

		$data = array (
			'allUsers'  => $allUsers
		);
		$this->render('admin/user/gestion', $data);
	}

	/*
	# id user
	*/
	public function change($id = null){


		if($this->input->post() && !empty($id)){
			$this->id = $id;

			$userValidation = getAdminUserUpdateForm(false);
			$this->form_validation->set_rules($userValidation);

			if ($this->form_validation->run() == FALSE)
            {    
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				redirect('/admin/user/gestion');
            }
           	else
            {
             	 $this->updateUser();
            }
		}

		redirect('/admin/user/gestion');
	}


	public function updateUser()
	{
		$tabUser['user_nom'] 		=  $this->input->post('nom');
		$tabUser['user_prenom'] 	=  $this->input->post('prenom');
		$tabUser['user_email'] 		=  $this->input->post('email');

		
		if ($this->form_validation->run() == FALSE)
        {     
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				redirect('/admin/user/gestion');
				exit();
        }

		if($this->my_user->update($tabUser, $this->id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
		
		redirect('/admin/user/gestion');
	}


	public function delete($id = null){

		if($this->my_user->delete($id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
			
		redirect('/admin/user/gestion');
	}	
}

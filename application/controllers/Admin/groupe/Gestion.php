<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Gestion extends MY_Admin_Controller {

	private $id;

	public function index($id = null)
	{       
		$allGroupes = $this->groupes->get_all();

		foreach ($allGroupes as &$unGroupe) {
			$unGroupe->form = getUpdateGroupeForm($unGroupe, true);
		}

		$data = array (
			'allGroupes'  => $allGroupes
		);
		$this->render('admin/groupe/gestion', $data);
	}

	/*
	# id user
	*/
	public function change($id = null){


		if($this->input->post() && !empty($id)){
			$this->id = $id;

			$groupeValidation = getUpdateGroupeForm(null, false);
			$this->form_validation->set_rules($groupeValidation);

			if ($this->form_validation->run() == FALSE)
            {    
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				redirect('/admin/groupe/gestion');
            }
           	else
            {
             	 $this->updateGroupe();
            }
		}

		redirect('/admin/user/gestion');
	}


	public function updateGroupe()
	{
		$tabGroupe['groupes_nom'] 			=  $this->input->post('nom');
		$tabGroupe['groupes_description'] 	=  $this->input->post('detail');

		
		if ($this->form_validation->run() == FALSE)
        {     
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				redirect('/admin/groupe/gestion');
				exit();
        }

		if($this->groupes->update($tabGroupe, $this->id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
		
		redirect('/admin/groupe/gestion');
	}


	public function delete($id = null){

		if($this->groupes->delete($id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
			
		redirect('/admin/groupe/gestion');
	}	
}

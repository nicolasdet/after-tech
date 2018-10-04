<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends MY_User_Controller {

	public function index($id = null)
	{       

		$idUser 			= $this->session->userdata('user');

		$entrepriseForm 	= getCreateEntrepriseForm();

		$data = array(
			'idUser' 		=> $idUser,
			'entrepriseForm'=> $entrepriseForm
		);

		$this->render('entreprises/create', $data);
	}

	public function create($id = null){

		if(!$this->input->post()){
			$this->flash->setFlash("erreur de création de l'entreprise", VALIDATION_MESSAGE_ERROR);
			return $this->index();
		}

		$getCreateForm	= getCreateEntrepriseForm(false);
		$this->form_validation->set_rules($getCreateForm);		

		if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				return $this->index();
            }
           else
            {
             	return $this->createEntreprise();
            }

		redirect('user/entreprise/createEntreprise');
	}

	public function createEntreprise(){

		$tabEntreprise['nom'] 		  = $this->input->post('nom');
		$tabEntreprise['description'] = $this->input->post('description');

		if($this->)
	}
}
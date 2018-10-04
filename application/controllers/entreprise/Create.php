<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends MY_User_Controller {

	public function index($id = null)
	{       
		$idUser 			= $this->session->userdata('user');
		$entreprise 		= $this
							->entreprise_user
							->where(['user_id' => $idUser])
							->with_entreprise()
							->get();
							
		if($entreprise != false){
			$this->flash->setFlash("Vous avez deja une entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user/entreprise');
		}		

		$entrepriseForm 	= getCreateEntrepriseForm();

		$data = array(
			'idUser' 		=> $idUser,
			'entrepriseForm'=> $entrepriseForm
		);
		$this->render('entreprises/create', $data);
	}

	public function createE($id = null){

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

		redirect('user/entreprise/create');
	}

	public function createEntreprise(){

		$tabEntreprise['entreprise_nom'] 		  = $this->input->post('nom');
		$tabEntreprise['entreprise_description']  = $this->input->post('description');

		$id = $this->entreprise->insert($tabEntreprise);
		if($id) {

			$tabEntrepriseUser['user_id']		= $this->session->userdata('user');
			$tabEntrepriseUser['entreprise_id'] = $id;

			if($this->entreprise_user->insert($tabEntrepriseUser)){

			$this->flash->setFlash("l'entreprise à bien éte crée", VALIDATION_MESSAGE);
			redirect('user/entreprise/'.$id);

			}else {

			$this->entreprise->delete($id);
			$this->flash->setFlash("erreur de création de l'entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user/entreprise/create');
			}

		}else {	
			$this->flash->setFlash("erreur de création de l'entreprise", VALIDATION_MESSAGE_ERROR);
			redirect('user/entreprise/create');
		}
	}
}
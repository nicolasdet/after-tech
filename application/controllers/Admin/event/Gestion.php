<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Gestion extends MY_Admin_Controller {

	private $id;

	public function index($id = null)
	{       
		$allEvents = $this->events->get_all();

		foreach ($allEvents as &$unEvent) {
			$unEvent->form = getUpdateEventForm(true, $unEvent);
		}

		$data = array (
			'allEvents'  => $allEvents
		);
		$this->render('admin/event/gestion', $data);
	}

	/*
	# id user
	*/
	public function change($id = null){


		if($this->input->post() && !empty($id)){
			$this->id = $id;

			$eventValidation = getUpdateEventForm(false);
			$this->form_validation->set_rules($eventValidation);

			if ($this->form_validation->run() == FALSE)
            {    
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				redirect('/admin/event/gestion');
            }
           	else
            {
             	 $this->updateEvent();
            }
		}

		redirect('/admin/event/gestion');
	}


	public function updateEvent()
	{
        $tabEvent['evenement_nom'] 			= $this->input->post('nom');
        $tabEvent['evenement_description']  = $this->input->post('description');
        $tabEvent['evenement_adresse'] 		= $this->input->post('adresse');
        $tabEvent['evement_ville'] 			= $this->input->post('ville');

        $time = strtotime( $this->input->post('date_debut'));
        $dateTransformée = date('Y-m-d',$time);

        # gestion de date
        $tabEvent['evenement_debut'] 		= $dateTransformée;
        $tabEvent['evenement_duree'] 		= $this->input->post('duree');
        $tabEvent['evenement_type'] 		= $this->input->post('type');

		
		if ($this->form_validation->run() == FALSE)
        {     
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				redirect('/admin/event/gestion');
				exit();
        }

		if($this->events->update($tabEvent, $this->id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
		
		redirect('/admin/event/gestion');
	}


	public function delete($id = null){

		if($this->events->delete($id))
			$this->flash->setFlash('reussit', VALIDATION_MESSAGE);
		else
			$this->flash->setFlash('Un problème est survenu.', VALIDATION_MESSAGE);
			
		redirect('/admin/event/gestion');
	}	
}

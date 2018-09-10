<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Create extends MY_User_Controller {
	
	# $id = id du groupe de l'event à crée
	public function index($id = null)
	{       

		# si il ne fait pas partis du groupe
		$admin = $this->isAdminOfGroup($id);
		if($admin === false) {	
			$this->flash->setFlash("Vous n'étes pas membre du groupe", VALIDATION_MESSAGE_ERROR);
			return redirect('/user/groupe/'.$id);
		}

		# on valide le form
		$confirmationData		= getCreateEventForm(false);	
		$this->form_validation->set_rules($confirmationData);

        if ($this->form_validation->run() == FALSE)
            {   
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				return redirect('/user/groupe/'.$id);
            }
            else
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
             	

               $eventC = $this->events->insert($tabEvent);

             	if($eventC){

             		$this->flash->setFlash("l'evenement à bien été crée", VALIDATION_MESSAGE);
             	}else{
                	$this->flash->setFlash("Erreur lors de la création de l'évenement", VALIDATION_MESSAGE_ERROR);
             	}
            }

		return redirect('/user/groupe/'.$id);
	}
}
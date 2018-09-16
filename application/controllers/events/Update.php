<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Update extends MY_User_Controller {
	
	# $id = id du groupe de l'event à crée
	public function index($id = null)
	{   
		# si il ne fait pas partis du groupe
        # si il est membre
        /*
        if(!$this->isMemberOfEvent($idGroupes)){
            $this->flash->setFlash("Vous ne faite pas parti de l'evenement", VALIDATION_MESSAGE_ERROR);
            return redirect('/user/groupe/');
        }
        */
		# on valide le form
        $getUpdateEventForm  = getUpdateEventForm(false);	
		$this->form_validation->set_rules($getUpdateEventForm);

        if ($this->form_validation->run() == FALSE)
            {   
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
				return redirect('/user/event/detail/'.$id);
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
             	
                $UpdateEvent = $this->events->update($tabEvent, $id);

               
            if(!empty($UpdateEvent) ){
    
             	    $this->flash->setFlash("l'evenement à bien été modifier", VALIDATION_MESSAGE);

             	}else{
                	$this->flash->setFlash("Erreur lors de la modification de l'évenement", VALIDATION_MESSAGE_ERROR);
             	}
            }

		return redirect('/user/event/detail/'.$id);
	}


    public function do_upload($idEvent)
        {
                $config['upload_path']          = './public/assets/img/upload/event/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 1000
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['overwrite']            = true;
                $config['file_name']            = $idEvent;
                
                $this->load->library('upload');
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('userfile'))
                {
                de($config['upload_path'].$this->upload->data('file_name'));
                    $error_message_type = array('error' => $this->upload->display_errors());
                    //$error_message_type = VALIDATION_MESSAGE_ERROR;  
                    $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);
                    redirect('user/event/detail/'.$idEvent);
                }
                else
                {
                    $data['evenement_img'] = $config['upload_path'].$this->upload->data('file_name');
                    $this->Evenements->update($data, $idEvent);  

                    redirect('user/event/detail/'.$idEvent);
                }
        }
}
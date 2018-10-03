<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class All extends MY_User_Controller {
	
	public function index($id = null)
	{      
        $idUser             = $this->session->userdata('user');
        $listGroupes        = $this->user_groupes->getByUserAndAdminCount($this->session->userdata('user'));
        $allEvents          = $this->events_groupes->getEventsByGroupeArray($listGroupes['id']); 

        $this->theme->data('allEvents', $allEvents);
        $this->render('events/all');
    }
}
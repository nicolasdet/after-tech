<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_User_Controller {

public function index($id = null)
{       
	$this->load->model('message');

	$idUser 			= $this->session->userdata('user');
	$listGroupes 		= $this->user_groupes->getByUserAndAdminCount($this->session->userdata('user'));
	$listeMessages		= $this->message->loadByUserIdCount($this->session->userdata('user'));
	$getEventsByGroupes = $this->events_groupes->getEventsByGroupeArray($listGroupes['id']); 
	$intervalString 	= false;
	$FirstEvent 		= array();
	$dateToday 			= new DateTime($this->today);
	$entreprise 		= $this
							->entreprise_user
							->where(['user_id' => $idUser])
							->with_entreprise()
							->get();


	if(!empty($getEventsByGroupes[0])){

		$FirstEvent = $getEventsByGroupes[0];

		foreach ($getEventsByGroupes as $UnEvent) {
			if($UnEvent->events->evenement_debut < $FirstEvent->events->evenement_debut)
					$FirstEvent = $UnEvent;
		}
		$date1 			= new DateTime($FirstEvent->events->evenement_debut);
		$interval 		= $dateToday->diff($date1);
	}

	$data = array(
		'idUser' 		=> $idUser,
		'listGroupes'	=> $listGroupes,
		'listeMessages' => $listeMessages,
		'FirstEvent'	=> $FirstEvent,
		'interval'		=> isset($interval) ? $interval : null,
		'entreprise'	=> $entreprise
	);

	$this->render('users/landing', $data);
}

}

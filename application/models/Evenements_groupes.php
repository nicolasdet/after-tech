<?php

class Evenements_groupes extends MY_Model {

	public $table = 'evenements_groupes';
	public $timestamps = false;

	public function __construct()
	{

		$this->has_one['events'] = array('foreign_model'=>'events','foreign_table'=>'evenements','foreign_key'=>'evenement_id','local_key'=>'evenement_id');

		$this->has_one['groupe'] = array('foreign_model'=>'Groupes','foreign_table'=>'groupes','foreign_key'=>'groupes_id','local_key'=>'groupes_id');

		parent::__construct();
	}


	public function getEventsByGroupeArray($listeId) {

		$EventsGroupes = array();
		foreach ($listeId as $GroupesId) {

		$res = $this
		->with_events('fields:*', 'where:`evenement_debut`> \''.date("Y-m-d").'\'')
		->where(['groupes_id' => $GroupesId ])
		->get_all();



		 	if(is_array($res)){
		 		foreach ($res as $unEvent) {
		 			if($unEvent != false && !empty($unEvent->events))
		 				array_push($EventsGroupes, $unEvent);
		 		}
		 	}else{
		 		if($res != false && !empty($res)){
		 			foreach ($res as $UnRes) {
		 				array_push($EventsGroupes, $UnRes);
		 			}
		 		}
		 	}
		} 
		return $EventsGroupes;
	}

	public function getCountEventsByGroupeArray($listeId) {

		$EventsGroupes = array();
		foreach ($listeId as $GroupesId) {

		$res = $this
		->where(['groupes_id' => $GroupesId ])
		->get_all();

		 	if(is_array($res)){
		 		foreach ($res as $unEvent) {
		 			if($unEvent != false && !empty($unEvent->events))
		 				array_push($EventsGroupes, $unEvent);
		 		}
		 	}else{
		 		if($res != false && !empty($res)){
		 			foreach ($res as $UnRes) {
		 				array_push($EventsGroupes, $UnRes);
		 			}
		 		}
		 	}
		} 

		
		return $EventsGroupes;
	}

	

	public function getEventsByGroupeArrayOld($listeId) {

		$EventsGroupes = array();
		foreach ($listeId as $GroupesId) {

		$res = $this
		->with_events('fields:*', 'where:`evenement_debut`< \''.date("Y-m-d").'\'')
		->where(['groupes_id' => $GroupesId ])
		->get_all();



		 	if(is_array($res)){
		 		foreach ($res as $unEvent) {
		 			if($unEvent != false && !empty($unEvent->events))
		 				array_push($EventsGroupes, $unEvent);
		 		}
		 	}else{
		 		if($res != false && !empty($res)){
		 			foreach ($res as $UnRes) {
		 				array_push($EventsGroupes, $UnRes);
		 			}
		 		}
		 	}
		} 
		return $EventsGroupes;
	}
}
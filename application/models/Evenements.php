<?php

class Evenements extends MY_Model {

	public $table = 'evenements';
	public $primary_key = 'evenement_id';
	public $timestamps = false;

 	public function __construct()
	{

 		$this->has_many['EG'] = array('foreign_model'=>'events_groupes','foreign_table'=>'evenements_groupes','foreign_key'=>'evenement_id','local_key'=>'evenement_id');

		parent::__construct();
	}
}
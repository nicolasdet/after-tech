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

}
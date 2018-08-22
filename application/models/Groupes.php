<?php

class Groupes extends MY_Model {

	public $table = 'groupes';
	public $primary_key = 'groupes_id';
	public $timestamps = false;


	public $protected_attributes = array('groupes_id');


	public function createGroupeAndAdmin($data, $id){

		$sql = '
		INSERT INTO `groupes` 
		( groupes_nom  ,  	groupes_description)
		VALUES ( ? ,  ? ); ';

		$result = $this->insert([
			"groupes_nom" => $data['groupes_nom'],
			"groupes_description" => $data['groupes_description']
		]);
		
		return $result;
	}
}
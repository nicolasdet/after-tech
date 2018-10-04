<?php

class Entreprise_user extends MY_Model {

	public $table = 'entreprise_user';
	public $primary_key = 'entreprise_user_id';
	public $timestamps = false;

 	public function __construct()
	{
		$this->has_one['entreprise'] = array('foreign_model'=>'entreprise','foreign_table'=>'entreprise','foreign_key'=>'entreprise_id','local_key'=>'entreprise_id');

		parent::__construct();

	}


	public function isMember($id){

		$res = $this->where(['user_id' => $id ])->get_all();

		if($res != false){
			return true;
		}
		return false;
	}
}

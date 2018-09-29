<?php

class Message extends MY_Model {

	public $table = 'message';
	public $primary_key = 'message_id';
	public $timestamps = false;

	public function __construct()
	{

		$this->has_one['salon'] = array('foreign_model'=>'salon','foreign_table'=>'salon','foreign_key'=>'salon_id','local_key'=>'salon_id');

		$this->has_one['user'] = array('foreign_model'=>'user','foreign_table'=>'user','foreign_key'=>'user_id','local_key'=>'user_id');

		
		parent::__construct();
	}

	public function loadByUserIdCount ($id){
		$res = $this->where([ 'user_id' => $id ])->get_all();
		$res['count'] = count($res);
		return $res;
	}
}
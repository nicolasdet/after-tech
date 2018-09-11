<?php

class User_groupes extends MY_Model {

	public $table = 'user_groupes';
	public $timestamps = false;

	public function __construct()
	{
		$this->has_one['groupe'] = array('foreign_model'=>'Groupes','foreign_table'=>'groupes','foreign_key'=>'groupes_id','local_key'=>'groupes_id');

		$this->has_one['user_model'] = array('foreign_model'=>'my_user','foreign_table'=>'user','foreign_key'=>'user_id','local_key'=>'user_id');		

		parent::__construct();
	}

	public function getByUserAndAdmin($id) {

		return $this->with_groupe()->where([ 'user_id' => $id ])->get_all();
	}

	public function isAdmin($idGroupe, $idAdmin)
	{
		$res = $this->where([ 'user_id' => $idAdmin, 'groupes_id' => $idGroupe])->get();

		if(!$res)
			return false;

		return $res->status;
	}


	public function isMemberOfGroup($groupeArray) {

		$allUser = array();
		foreach ($groupeArray as $key => $value) {

		// $getUsers =  $this->where('groupes_id', 22)->get_all('user_id');
		
		 //de($getUsers);
		}

	}

	public function getUsersGroupe($idGroupe)
	{
		$count =  $this->where('groupes_id', $idGroupe)->as_array()->count_rows();
		$this->as_object();

		$all_users =  $this->with_user_model()->where('groupes_id', $idGroupe)->get_all();

		return array( "users" => $all_users, "count" => $count);
	}
}
<?php

class Invitation_ug extends MY_Model {

	public $table = 'user_groupes_invitation';
	public $timestamps = false;

	public function __construct()
	{
		$this->has_one['groupe'] = 
		array('foreign_model'=>'Groupes','foreign_table'=>'groupes','foreign_key'=>'groupes_id','local_key'=>'groupes_id');

		$this->has_one['user_invit'] = 
		array('foreign_model'=>'my_user','foreign_table'=>'user','foreign_key'=>'user_id','local_key'=>'user_id');
		parent::__construct();
	}

	public function setInvitation()
	{
		
	}
}
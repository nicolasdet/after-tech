<?php

class User extends MY_Model {

	public $table = 'user';
	public $primary_key = 'con_id';


	public $protected_attributes = array('user_id');


	public function checkExisteEmail()
	{
		return false;
	}

	public function createUser($data)
	{
		if(!checkExisteEmail())
		{
			return false; 
		}



		$sql = '
		INSERT INTO `user` 
		( `nom`, `password`, `prenom`, `email`, `status`)
		VALUES ( ? ,  ? , ? , ? ,  ? )
		';

		return $this->db->query($sql, [$data])->row();
	}

}
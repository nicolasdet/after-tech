<?php

class User extends MY_Model {

	public $table = 'user';
	public $primary_key = 'user_id';
	public $timestamps = false;


	public $protected_attributes = array('user_id');


	public function match_email($email)
	{

		$sql = '
		SELECT  count(*) as nombre
		FROM `user` 
		WHERE user_email =   ? 
		';

		$row =  $this->db->query($sql, [$email])->row();

		if(intval($row->nombre)  <= 0)
		{
			return true;
		}
		return false;
	}

	public function createUser($data)
	{

		$data['user_password'] = password_hash($data['user_password'], PASSWORD_DEFAULT);

		$sql = '
		INSERT INTO `user` 
		( user_nom , user_prenom, user_email, user_password, user_status)
		VALUES ( ? ,  ? , ? , ? ,  ? ); ';

		$result = $this->db->query($sql, [
			$data['user_nom'],$data['user_prenom'], $data['user_email'], $data['user_password'], $data['user_status']
		]);

		return $result;
	}

	public function updateUser($data, $id)
	{

		$sql = '
		UPDATE `user` 
		SET  user_nom = ? , user_prenom = ? , user_email = ?
		WHERE user_id = '. $id .' 

		 ';

		$result = $this->db->query($sql, [
			$data['user_nom'],$data['user_prenom'], $data['user_email']
		]);

		return $result;
	}

	public function connectUser($data)
	{
		$sql = 'SELECT user_id as id, user_password as password
		FROM user
		WHERE user_email = ?
		; ';

		$result = $this->db->query($sql, [
			 $data['user_email'], 
		])->row();

		if(empty($result)){
			return false;
		}

		if(!password_verify($data['user_password'], $result->password))
		{
			return false;
		}

		return $result->id;
	}

}
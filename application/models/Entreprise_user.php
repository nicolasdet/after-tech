<?php

class Entreprise_user extends MY_Model {

	public $table = 'entreprise_user';
	public $primary_key = 'entreprise_user_id';
	public $timestamps = false;

 	public function __construct()
	{
		parent::__construct();
	}
}
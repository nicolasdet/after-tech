<?php

class Entreprise extends MY_Model {

	public $table = 'entreprise';
	public $primary_key = 'entreprise_id';
	public $timestamps = false;

 	public function __construct()
	{
		parent::__construct();
	}
}
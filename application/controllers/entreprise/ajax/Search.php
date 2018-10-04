<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends MY_User_Controller {

	public function index($text = null)
	{       

		$res =  $this->entreprise->where('entreprise_nom like ', '%'.$text.'%')->get_all();
		echo json_encode($res);
		exit();
	}
}
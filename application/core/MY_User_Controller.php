<?php

class MY_User_Controller extends MY_Controller
{
	/*
*/

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);

		if(isset($_GET['disconnect'])){
			if($_GET['disconnect'] == true){
				$this->session->unset_userdata('user');
				redirect('bofamille/connexion');
			}
		}

		//$this->_checkConnection();
	}



}

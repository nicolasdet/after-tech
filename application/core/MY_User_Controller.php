<?php

class MY_User_Controller extends MY_Controller
{
	/*
*/

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);

		$this->theme->css('user_custom');

		if(isset($_GET['disconnect'])){
			if($_GET['disconnect'] == true){
				$this->session->unset_userdata('user');
				$this->session->unset_userdata('loged');
				redirect('/');
			}
		}

		if(!$this->session->userdata('loged') || !$this->session->userdata('user'))
		{
			redirect('/');
		}

		//$this->_checkConnection();
		$this->getUser();
	}

	protected function getUser()
	{
		$this->load->model('User', 'my_user');
		$user = $this->my_user->get($this->session->userdata('user'));

		$this->theme->data('user', $user);
	}



}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Invitation extends MY_User_Controller {

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->load->model('Invitation_ug', 'invitation');
	}



	public function index($id = null)
	{       
		$listeInvitations = $this->invitation
		->with_groupe()
		->where(array(
			'user_id' => $this->session->userdata('user'),
			'status >' => 0
		))
		->get_all();

		$this->theme->data('listeInvitations', $listeInvitations );
		$this->render('users/groupe_inscription');
	}

	public function ok($id = null)
	{
		if(!empty($id))
		{
			//if($this->user_groupes-> )
		}

		redirect("/user/groupe/invitation");
	}

	public function refuser($id = null)
	{
		if(!empty($id))
		{

		}

		redirect("/user/groupe/invitation");
	}
}

<?php

# controller donc on hérite quand on est connecter
class MY_Admin_Controller extends MY_Controller
{
	# on charge les donné user 
	protected $user;
	protected $userImgPath;

	public function __construct($layout = 'admin')
	{
		parent::__construct($layout);
		$this->theme->css('user_custom');

		# on vérifie si il ce déconnecte
		if(isset($_GET['disconnect'])){
			if($_GET['disconnect'] == true){
				$this->session->unset_userdata('user');
				$this->session->unset_userdata('loged');
				$this->session->unset_userdata('admin');
				redirect('/');
			}
		}

		$this->getUser();
		$this->getGroupe();
		$this->getEvents();
		$this->load->helper('groupe_form');
		$this->load->helper('events_form_helper');

		$this->theme->slice(array('admin_top', 'admin_bottom'));

	}

	protected function getUser()
	{
		$this->load->model('User', 'my_user');
	}
	protected function getGroupe()
	{
		$this->load->model('User_groupes', 'user_groupes');
		$this->load->model('Groupes', 'groupes');
	}

	protected function getEvents()
	{
		$this->load->model('Evenements', 'events');
		$this->load->model('Evenements_groupes', 'events_groupes');
	}


}

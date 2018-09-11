<?php

# controller donc on hérite quand on est connecter
class MY_User_Controller extends MY_Controller
{
	# on charge les donné user 
	protected $user;
	protected $userImgPath;

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->theme->css('user_custom');

		# on vérifie si il ce déconnecte
		if(isset($_GET['disconnect'])){
			if($_GET['disconnect'] == true){
				$this->session->unset_userdata('user');
				$this->session->unset_userdata('loged');
				redirect('/');
			}
		}

		# on vérifie si il à le droit d'étre ici
		if(!$this->session->userdata('loged') || !$this->session->userdata('user'))
		{
			redirect('/');
		}

		# on charge les model & certaines informations
		$this->getUser();
		$this->getGroupe();
		$this->getEvents();
		$this->load->helper('groupe_form');
		$this->load->helper('events_form_helper');

	}

	protected function getUser()
	{
		$this->load->model('User', 'my_user');
		$this->user = $this->my_user->get($this->session->userdata('user'));
		$this->theme->data('user', $this->user);

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

	protected function error_check_email()
	{
		 if(!$this->my_user->match_email($this->input->post('email')))
            {
                    $this->error_message .= "l'email existe deja.";
            }
    }

	protected function error_check_samePasswork()
	{
		if(!$this->my_user->MatchPassword($this->user->user_id, $this->input->post('password')))
            {
                  $this->error_message .= "le mot de passe est erroné.";	
            }
             
	}

	# il sufil d'apeller cette fonction pour savoir si le user courrant est admin ou pas
	# on peut l'upgrade avec un $user si besoin
	public function isAdminOfGroup($idGroupe)
	{
		$admin  = $this->user_groupes->isAdmin($idGroupe, $this->session->userdata('user'));
		return $admin;
	}

}

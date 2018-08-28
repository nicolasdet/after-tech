<?php

class MY_User_Controller extends MY_Controller
{

	protected $user;

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

		$this->getUser();
		$this->getGroupe();

		$this->load->helper('groupe_form');
	}




	protected function getUser()
	{
		$this->load->model('User', 'my_user');
		$this->user = $this->my_user->get($this->session->userdata('user'));

		$this->theme->data('user', $this->user);
		//$profileExt = pathinfo('./public/assets/img/upload/users/'.$this->session->userdata('user'), PATHINFO_EXTENSION);
		//var_dump($profileExt);
	}

	protected function getGroupe()
	{
		$this->load->model('User_groupes', 'user_groupes');
		$this->load->model('Groupes', 'groupes');
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

}

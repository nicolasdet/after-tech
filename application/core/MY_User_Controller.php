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
	}

	protected function getUser()
	{
		$this->load->model('User', 'my_user');
		$this->user = $this->my_user->get($this->session->userdata('user'));

		$this->theme->data('user', $this->user);
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

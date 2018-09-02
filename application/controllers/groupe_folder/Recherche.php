<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Recherche extends MY_User_Controller {


	private $groupeLimite = 4;
	private $showAll = false;
	private $getNomParam = "";
	private $listeGroupeDefault;

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->theme->js('custom_image_getter');
		
	}

	public function index($id = null)
	{       
		# on charge le formulaire 
		$getSearchGroupeForm = getSearchGroupeForm();

		# si on fait une recherche sur le nom OU pas
		if($this->input->get('nom')){
			$this->getLikeGroupe();
		} else {
			$this->listeGroupeDefault = $this->groupes->limit($this->groupeLimite)->get_all();
		}

		#pour chaque groupe on doit savoir si on est membre voir / admin
		$this->loadUserGroupe();

		$this->theme->data('getNomParam', $this->getNomParam);
		$this->theme->data('getSearchGroupeForm', $getSearchGroupeForm);
		$this->theme->data('listeGroupeDefault', $this->listeGroupeDefault);
		$this->theme->data('all', $this->showAll); # affiche t'on tout les groupes
		$this->render('users/groupe_search');
	}

	public function all()
	{
		$this->groupeLimite = 24;
		$this->showAll = true;
		return $this->index();
	}

	public function getLikeGroupe()
	{	#moteur de recherche
		if($this->input->get('nom'))
		{
			$this->getNomParam = $this->input->get('nom');
		}
		$this->listeGroupeDefault = $this->groupes
		->where('groupes_nom like ', '%'.$this->getNomParam.'%')
		->limit($this->groupeLimite)->get_all();

		return;
	}

	private function loadUserGroupe()
	{	#pour chaque groupe on charge le status du user et si des invitations sont en cour
		$this->load->model('Invitation_ug', 'invitation');

		if(isset($this->listeGroupeDefault) && !empty($this->listeGroupeDefault))
		{
			foreach ($this->listeGroupeDefault as $key => $unGroupe) {
				$idGroupe = $unGroupe->groupes_id;
				$userGroupes = $this->user_groupes
				->where(array('groupes_id' => $idGroupe, 'user_id' => $this->session->userdata('user')))
				->get();

				$userInvitation = $this->invitation
				->where(array('groupes_id' => $idGroupe, 'user_id' => $this->session->userdata('user')))
				->get();
				
				$unGroupe->currentUser    = $userGroupes;

				if(!empty($userInvitation)){
					$unGroupe->userInvitation = $userInvitation->type;
				}else{
					$unGroupe->userInvitation = 0;
				}
			}
		}
		return;
	}


}

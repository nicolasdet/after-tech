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
		# on charge le formulaire 
		
	}

	public function index($id = null)
	{       
		$getSearchGroupeForm = getSearchGroupeForm();
		# si on fait une recherche sur le nom OU pas
		if($this->input->get('nom')){
			$this->getLikeGroupe();
		} else {
			$this->listeGroupeDefault = $this->groupes->limit($this->groupeLimite)->get_all();
		}

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
	{
		if($this->input->get('nom'))
		{
			$this->getNomParam = $this->input->get('nom');
		}
		$this->listeGroupeDefault = $this->groupes
		->where('groupes_nom like ', '%'.$this->getNomParam.'%')
		->limit($this->groupeLimite)->get_all();

		//var_dump($this->listeGroupeDefault);
		return;
	}


}

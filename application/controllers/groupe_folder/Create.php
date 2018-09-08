<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Create extends MY_User_Controller {

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->theme->js('custom_file_upload');
		
	}

	public function index($id = null)
	{       
		$CreateGroupeFormData = getCreateGroupeForm();

		$this->theme->data('CreateGroupeFormData', $CreateGroupeFormData);
		$this->render('users/groupe_create');
	}

	public function createGroupe($id = null){

		$getCreateGroupeForm	= getCreateGroupeForm(false);
		$this->form_validation->set_rules($getCreateGroupeForm);		

		if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
                $this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				return $this->index();
            }
           else
            {
             	return $this->createGroupeUser();
            }

		redirect('/user/groupe/create');
	}


	public function createGroupeUser($id = null){

		$this->load->model('User_groupes', 'user_groupes');

		$tabGroupe['groupes_nom']    	 = 	$this->input->post('nom');
		$tabGroupe['groupes_description'] =   $this->input->post('detail');

		$groupeId = $this->groupes->createGroupeAndAdmin($tabGroupe, $this->session->userdata('user'));
		if($groupeId) {

			$tabUserGroupe['user_id'] 		= $this->session->userdata('user');
			$tabUserGroupe['groupes_id']	= $groupeId;
			$tabUserGroupe['status']		= 1;

			$user_groupe = $this->user_groupes->insert($tabUserGroupe);
			if(isset($user_groupe))
			{

				$name = $this->session->userdata('image_groupe_cache');
				$type = $this->session->userdata('image_groupe_cache_type');

				if(file_exists("public/assets/img/upload/temporaire/".$name)){
			 		rename("public/assets/img/upload/temporaire/".$name, "public/assets/img/upload/groupes/".$groupeId.".".$type);

			 		$tabUserGroupeImg['groupes_img'] = "public/assets/img/upload/groupes/".$groupeId.".".$type;
			 		$this->groupes->update($tabUserGroupeImg, $groupeId);
				}

            	$this->flash->setFlash("Le groupe à bien été crée", VALIDATION_MESSAGE);

            	return redirect('/user/groupe/'.$groupeId);

			}

		    $this->flash->setFlash("Problem lors de la création de l'administrateur du groupe.", VALIDATION_MESSAGE_ERROR);		
		}else {

		    $this->flash->setFlash("Problem lors de la création du groupe.", VALIDATION_MESSAGE_ERROR);
		}
		
		return redirect('/user/groupe/create');
	}


	public function img($id = null) {


		 $type = $this->input->get('type');
		 $file = $this->input->post('file');
		 $name = $this->session->userdata('user'). '.' .$type;

		 $image_name = $this->session->set_userdata('image_groupe_cache_type', $type);
		 $image_name = $this->session->set_userdata('image_groupe_cache', $name);
		 
		 // Encode it correctly
		 $encodedData = str_replace(' ','+',$file);
		 $decodedData = base64_decode($encodedData);
		 // Finally, save the image

		file_put_contents('public/assets/img/upload/temporaire/'.$name, $decodedData);
		echo "public/assets/img/upload/temporaire/".$name;
	}

	public function getImgCache($id = null) {
	
		$name = $this->session->userdata('image_groupe_cache');

		if(file_exists("public/assets/img/upload/temporaire/".$name)){
			 echo "public/assets/img/upload/temporaire/".$name;

		}
		return;
	}
	


}

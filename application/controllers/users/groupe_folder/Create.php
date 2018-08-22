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
                $error_message_type = VALIDATION_MESSAGE_ERROR;    
                $this->session->set_userdata('error_message', $this->error_message);
                $this->session->set_userdata('error_message_type', $error_message_type);

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

			$user_groupe = $this->user_groupes->insert($tabUserGroupe);
			if(isset($user_groupe)){

            $this->error_message = "Le groupe à bien été crée"; 
            $error_message_type = VALIDATION_MESSAGE;
            $this->session->set_userdata('error_message', $this->error_message);
            $this->session->set_userdata('error_message_type', $error_message_type);

            return redirect('/user/groupe/'.$groupeId);

		}
			$error_message_type = VALIDATION_MESSAGE_ERROR;  
			$this->error_message = "Problem lors de la création de l'administrateur du groupe."; 
		    $this->session->set_userdata('error_message', $this->error_message);
		    $this->session->set_userdata('error_message_type', $error_message_type);			


		}else {

			$error_message_type = VALIDATION_MESSAGE_ERROR;  
			$this->error_message = "Problem lors de la création du groupe."; 
		    $this->session->set_userdata('error_message', $this->error_message);
		    $this->session->set_userdata('error_message_type', $error_message_type);
		}


		
		return redirect('/user/groupe/create');
	}


	public function img($id = null) {


		 $type = $this->input->get('type');
		 $file = $this->input->post('file');
		 $name = $this->session->userdata('user'). '.' .$type;
		 
		 // Encode it correctly
		 $encodedData = str_replace(' ','+',$file);
		 $decodedData = base64_decode($encodedData);
		 // Finally, save the image

		file_put_contents('public/assets/img/upload/temporaire/'.$name, $decodedData);
		echo "public/assets/img/upload/temporaire/".$name;
	}

	public function getImg($id = null) {
	


		 $name = $this->session->userdata('user'). '.jpg';

		 if (file_exists("public/assets/img/upload/temporaire/".$name)) {

			    echo "public/assets/img/upload/temporaire/".$name;

			} else {
				$name = $this->session->userdata('user'). '.png';
				 echo "public/assets/img/upload/temporaire/".$name;
			}

		return;
	}
	


}

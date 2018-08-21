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


	public function img($id = null) {
		 		 
		 		 $type = $this->input->get('type');
		         $file = $this->input->post('file');
		         $name = $id. '.' .$type;
		 
		         // Encode it correctly
		         $encodedData = str_replace(' ','+',$file);
		         $decodedData = base64_decode($encodedData);
		         // Finally, save the image
		         // $this->jeux->updateJeuxImg($id,$type);
		      
		       	 file_put_contents('public/assets/img/jeux/puzzle/'.$name, $decodedData) ;
		       		echo "assets/img/jeux/puzzle/".$name;
	}


}

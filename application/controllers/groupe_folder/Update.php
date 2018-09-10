<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Update extends MY_User_Controller {

	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->load->model('Invitation_ug', 'invitation');
		
	}

	# @id = id groupe
	public function index($id = null)
	{   
		
		# informations du groupe
		$Groupe_detail 		 		= $this->groupes->get($id);
		$Groupe_detail->membres 	= $this->user_groupes->getUsersGroupe($id);
		$admin 		  		 		= $this->isAdminOfGroup($id);


		# si il ne fait pas partis du groupe
		if($admin === false) {	

			$this->flash->setFlash("Vous n'étes pas membre du groupe", VALIDATION_MESSAGE_ERROR);
			return redirect('/user/groupe/recherche');
		}

		# on charge le formulaire de recherche d'utilisateur
		$getUpdateGroupeForm	= getUpdateGroupeForm($Groupe_detail, false);
		$this->form_validation->set_rules($getUpdateGroupeForm);

		if ($this->form_validation->run() == FALSE || $this->error_message != "")
            {     
                $this->error_message .= validation_errors();
				$this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

				return redirect('/user/groupe/'.$id);
            }
           else
            {
             	return $this->updateGroupe($id);
            }


		return redirect('/user/groupe/'.$id);
	}

	public function updateGroupe($id)
	{
		$tabUser['groupes_nom']   		 = 	 $this->input->post('nom');
		$tabUser['groupes_description']  =   $this->input->post('detail');

		if($this->groupes->update($tabUser, $id)) {

            $this->flash->setFlash("Le groupe à bien ete modifier", VALIDATION_MESSAGE);

		}else {

		    $this->flash->setFlash("Problem lors de la modification du groupe.", VALIDATION_MESSAGE);
		}
		
		return redirect('/user/groupe/'.$id);
	}



	public function do_upload($id)
        {
                $config['upload_path']          = './public/assets/img/upload/groupes/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['overwrite']            = true;
                $config['file_name']            = $id;
                

                $this->load->library('upload');
                $this->upload->initialize($config);

                if ( ! $this->upload->do_upload('userfile')){
  
						$this->error_message = $this->upload->display_errors(); 
		   				$this->flash->setFlash($this->error_message, VALIDATION_MESSAGE_ERROR);

                        return redirect('/user/groupe/'.$id);
                }
                else
                {
                	$data['groupes_img'] = $config['upload_path'].$this->upload->data('file_name');
                	$this->groupes->update($data, $id);  
                      //$data = array('upload_data' => $this->upload->data());

                    return redirect('/user/groupe/'.$id);
                }
        }


}
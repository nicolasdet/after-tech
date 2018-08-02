<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getInscriptionForm'))
{
 	function getInscriptionForm($form = true)
 	{
 		$formData = array();
 		$validationData = array();

		$formData['form']  = array('class' => 'form');
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom',
				'label' => 'Nom',
				'wrapper' => 'col-12'
		);
		$validationData['nom'] = array (
					'field' => 'nom',
			        'label' => 'Nom',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			       ),
		);

		$formData['prenom']   = array(
				'name' => 'username',
				'placeholder'=>'username',
				'label' => 'Prenom',
				'wrapper' => 'col-12'
		);
		$validationData['prenom'] = array (
					'field' => 'prenom',
			        'label' => 'Prenom',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			       ),
		);

		$formData['email']   = array(
				'name' => 'email',
				'placeholder'=>'email',
				'type' => 'email',
				'label' => 'Email',
				'wrapper' => 'col-12'
		);
		$validationData['email'] = array (
					'field' => 'email',
			        'label' => 'Email',
			        'rules' => 'required|valid_email',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			             'valid_email' => 'L\'email doit étre valise' 
			       ),
		);

		$formData['password']   = array(
				'name' => 'password',
				'placeholder'=>'mot de passe',
				'label' => 'Mot de passe',
				'wrapper' => 'col-12'
		);
		$validationData['password'] = array (
					'field' => 'password',
			        'label' => 'Mot de passe',
			        'rules' => 'trim|required|min_length[8]',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			             'min_length' => 'Le mot de passe doit faire 8 charractere minimum'
			       ),
		);


		$formData['second-password']   = array(
				'name' => 'second-password',
				'placeholder'=>'mot de passe',
				'label' => 'Recopiez le mot de passe',
				'wrapper' => 'col-12'
		);
		$validationData['second-password'] = array (
					'field' => 'second-password',
			        'label' => 'deuxieme mot de passe',
			        'rules' => 'trim|required|min_length[8]|matches[password]',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			             'min_length' => 'Le mot de passe doit faire 8 charractere minimum',
			             'matches' => 'les mot de passe ne sont pas identiques'
			       ),
		);
		


		if($form)
 			return $formData;
 
 		return $validationData;
 	}





 	function getConnexionForm()
 	{	
 		$formData = array();
		$formData['form']  = array('class' => 'form');

		$formData['email']   = array(
				'name' => 'email',
				'placeholder'=>'email',
				'type' => 'email',
				'label' => 'Email',
				'wrapper' => 'col-12'
		);
		$formData['password']   = array(
				'name' => 'password',
				'placeholder'=>'mot de passe',
				'label' => 'Mot de passe',
				'wrapper' => 'col-12'
		);

 		return $formData;
 
 	}
}

?>
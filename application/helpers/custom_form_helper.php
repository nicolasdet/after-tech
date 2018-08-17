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
				'name' => 'prenom',
				'placeholder'=>'prenom',
				'label' => 'Prenom',
				'wrapper' => 'col-12'
		);
		$validationData['prenom'] = array (
					'field' => 'prenom',
			        'label' => 'prenom',
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
				'type' => 'password',
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
				'type' => 'password',
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
}

if (!function_exists('getConnexionForm'))
{
 	function getConnexionForm($form = true)
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
			        'rules' => 'trim|required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			       ),
		);

 		if($form)
 			return $formData;
 
 		return $validationData;
 
 	}
 }

if (!function_exists('getUpdateUserForm'))
{
 	function getUpdateUserForm($user, $form = true)
 	{	
 		$formData = array();
 		$validationData = array();

		$formData['form']  = array('class' => 'form');
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom',
				'label' => 'Nom',
				'wrapper' => 'col-6',
				'value' => isset($user->user_nom) ? $user->user_nom : ''
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
				'name' => 'prenom',
				'placeholder'=>'prenom',
				'label' => 'Prenom',
				'wrapper' => 'col-6',
				'value' => isset($user->user_prenom) ? $user->user_prenom : ''
		);
		$validationData['prenom'] = array (
					'field' => 'prenom',
			        'label' => 'prenom',
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
				'wrapper' => 'col-12',
				'value' => isset($user->user_email) ? $user->user_email : ''
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

 		if($form)
 			return $formData;
 
 		return $validationData;
 
 	}
 }


?>
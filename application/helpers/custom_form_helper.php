<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getInscriptionForm'))
{
 	function getInscriptionForm()
 	{
 		$formData = array();
		$formData['form']  = array('class' => 'form');
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom',
				'label' => 'Nom',
				'wrapper' => 'col-12'
		);
		$formData['prenom']   = array(
				'name' => 'username',
				'placeholder'=>'username',
				'label' => 'Prenom',
				'wrapper' => 'col-12'
		);
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
		$formData['second-password']   = array(
				'name' => 'second-password',
				'placeholder'=>'mot de passe',
				'label' => 'Recopiez le mot de passe',
				'wrapper' => 'col-12'
		);		
 		return $formData;
 
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
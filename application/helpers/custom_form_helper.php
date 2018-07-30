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
		);
		$formData['prenom']   = array(
				'name' => 'username',
				'placeholder'=>'username',
		);
		$formData['email']   = array(
				'name' => 'email',
				'placeholder'=>'email',
				'type' => 'email'
		);
		$formData['password']   = array(
				'name' => 'password',
				'placeholder'=>'mot de passe',
		);
		$formData['second-password']   = array(
				'name' => 'second-password',
				'placeholder'=>'mot de passe',
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
				'type' => 'email'
		);
		$formData['password']   = array(
				'name' => 'password',
				'placeholder'=>'mot de passe',
		);

 		return $formData;
 
 	}
}

?>
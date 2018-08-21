<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getCreateGroupeForm'))
{
 	function getCreateGroupeForm($form = true)
 	{
 		$formData = array();
 		$validationData = array();

		$formData['form']  = array('class' => 'form');
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom',
				'label' => 'Nom',
				'wrapper' => 'col-10'
		);
		$validationData['nom'] = array (
					'field' => 'nom',
			        'label' => 'Nom',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			       ),
		);

		$formData['detail']   = array(
				'name' => 'detail',
				'placeholder'=>'description',
				'label' => 'description',
				'wrapper' => 'col-10'
		);
		$validationData['detail'] = array (
					'field' => 'detail',
			        'label' => 'description',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.',
			       ),
		);

		if($form)
 			return $formData;
 
 		return $validationData;
 	}
}
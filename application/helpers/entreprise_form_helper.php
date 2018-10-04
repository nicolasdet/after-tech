<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getCreateEntrepriseForm'))
{
 	function getCreateEntrepriseForm($form = true, $entreprise = null)
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

		$formData['description']   = array(
				'name' => 'description',
				'placeholder'=>'description',
				'label' => 'description',
				'wrapper' => 'col-10'
		);
		$validationData['description'] = array (
					'field' => 'description',
			        'label' => 'description',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);

		if($form)
 			return $formData;
 
 		return $validationData;
 	}
}

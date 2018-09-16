<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');


if (!function_exists('getCreateEventForm'))
{
 	function getCreateEventForm($form = true)
 	{
 		$formData = array();
 		$validationData = array();

		$formData['form']  = array('class' => 'form');
		
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom de l\'evenement',
				'label' => 'Nom de l\'evenement',
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

		$formData['description']   = array(
				'name' => 'description',
				'placeholder'=>'description de l\'evenement',
				'label' => 'Description de l\'evenement',
				'wrapper' => 'col-12'
		);
		$validationData['description'] = array (
					'field' => 'description',
			        'label' => 'Description',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);

		$formData['adresse']   = array(
				'name' => 'adresse',
				'placeholder'=>'adresse de l\'evenement',
				'label' => 'Adresse de l\'evenement',
				'wrapper' => 'col-12'
		);
		$validationData['adresse'] = array (
					'field' => 'adresse',
			        'label' => 'Adresse',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir l\' %s.',
			       ),
		);

		$formData['ville']   = array(
				'name' => 'ville',
				'placeholder'=>'ville de l\'evenement',
				'label' => 'Ville de l\'evenement',
				'wrapper' => 'col-12'
		);
		
		$validationData['ville'] = array (
					'field' => 'ville',
			        'label' => 'Ville',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);


		$formData['date_debut']   = array(
				'name' => 'date_debut',
				'placeholder'=>'Date de début de l\'evenement',
				'class' => 'datepicker',
				'label' => 'Date de début de l\'evenement',
				'wrapper' => 'col-12'
		);
		$validationData['date_debut'] = array (
					'field' => 'date_debut',
			        'label' => ' date de début',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);	

		$formData['duree']   = array(
				'name' => 'duree',
				'placeholder'=>'durée de l\'evenement',
				'label' => 'durée de l\'evenement',
				'type' => 'number',
				'wrapper' => 'col-12'
		);
		$validationData['duree'] = array (
					'field' => 'duree',
			        'label' => 'duree',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			             'numeric'  => 'Le champs $s doit étre un chiffre'
			       ),
		);	

		$formData['type']   = array(
				'name' => 'type',
				'label' => 'Type d\'evenement',
				'options' => array('1' => 'publique', 'priver'),
				'wrapper' => 'col-12'
		);
		$validationData['type'] = array (
					'field' => 'type',
			        'label' => 'type',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.'
			       ),
		);	

		if($form)
 			return $formData;
 
 		return $validationData;
 	}
}


if (!function_exists('getUpdateEventForm'))
{
 	function getUpdateEventForm($form = true, $event = null)
 	{
 		$formData = array();
 		$validationData = array();

		$formData['form']  = array('class' => 'form');
		
		$formData['nom']   = array(
				'name' => 'nom',
				'placeholder'=>'nom de l\'evenement',
				'label' => 'Nom de l\'evenement',
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_nom) ? $event->evenement_nom : ''
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
				'placeholder'=>'description de l\'evenement',
				'label' => 'Description de l\'evenement',
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_description) ? $event->evenement_description : ''
		);
		$validationData['description'] = array (
					'field' => 'description',
			        'label' => 'Description',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);

		$formData['adresse']   = array(
				'name' => 'adresse',
				'placeholder'=>'adresse de l\'evenement',
				'label' => 'Adresse de l\'evenement',
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_adresse) ? $event->evenement_adresse : ''
		);
		$validationData['adresse'] = array (
					'field' => 'adresse',
			        'label' => 'Adresse',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir l\' %s.',
			       ),
		);

		$formData['ville']   = array(
				'name' => 'ville',
				'placeholder'=>'ville de l\'evenement',
				'label' => 'Ville de l\'evenement',
				'wrapper' => 'col-12',
				'value' => isset($event->evement_ville) ? $event->evement_ville : ''
		);
		
		$validationData['ville'] = array (
					'field' => 'ville',
			        'label' => 'Ville',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);


		$formData['date_debut']   = array(
				'name' => 'date_debut',
				'placeholder'=>'Date de début de l\'evenement',
				'class' => 'datepicker',
				'label' => 'Date de début de l\'evenement',
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_debut) ? $event->evenement_debut : ''
		);
		$validationData['date_debut'] = array (
					'field' => 'date_debut',
			        'label' => ' date de début',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			       ),
		);	

		$formData['duree']   = array(
				'name' => 'duree',
				'placeholder'=>'durée de l\'evenement',
				'label' => 'durée de l\'evenement',
				'type' => 'number',
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_duree) ? $event->evenement_duree : ''
		);
		$validationData['duree'] = array (
					'field' => 'duree',
			        'label' => 'duree',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir la %s.',
			             'numeric'  => 'Le champs $s doit étre un chiffre'
			       ),
		);	

		$formData['type']   = array(
				'name' => 'type',
				'label' => 'Type d\'evenement',
				'options' => array('1' => 'publique', 'priver'),
				'wrapper' => 'col-12',
				'value' => isset($event->evenement_type) ? $event->evenement_type : ''
		);
		$validationData['type'] = array (
					'field' => 'type',
			        'label' => 'type',
			        'rules' => 'required',
			        'errors' => array(
			             'required' => 'Vous devez remplir le %s.'
			       ),
		);	

		if($form)
 			return $formData;
 
 		return $validationData;
 	}
}
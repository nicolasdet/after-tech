<?php

	/**
	 * Créer un select
	 * @param param : tableau avec les paramètres pour configurer le select
	 * 					- name : le nom du select
	 * 					- label : le label
	 * 					- options : tableau des valeurs du select
	 * 					- options_data : tableau des data à ajouter aux différentes options (à fusionner éventuellement avec la variable options si on rajoute des nouvelles options)
	 * 					- add_empty : Ajoute une option nulle dans la liste
	 * 					- selected : valeur sélectionnée par défaut dans la liste
	 * 					- error : texte d'erreur éventuelle
	 * 					- info : texte d'info à afficher sous le champ
	 * 					- class : tableau de classes à ajouter sur le select
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 * 					- required : champ obligatoire
	 * 					- disabled : champ désactivé
	 * 					- data : autre attribut (exemple data) à rajouter au select
	 */
	function drawSelect($param)
	{
		$name			= !empty($param['name']) ? $param['name'] : 'default';
		$error			= !empty($param['error']) ? $param['error'] : '';
		$info			= !empty($param['info']) ? $param['info'] : '';
		$label			= !empty($param['label']) ? $param['label'] : null;
		$options		= !empty($param['options']) ? $param['options'] : [];
		$options_data	= !empty($param['options_data']) ? $param['options_data'] : [];
		$add_empty		= !empty($param['add_empty']) ? true : false;
		$selected		= !empty($param['selected']) ? $param['selected'] : '';
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$data			= !empty($param['data']) ? $param['data'] : [];
		$required		= !empty($param['required']) ? true : false;
		$disabled		= !empty($param['disabled']) ? true : false;
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : [];
		if (!empty($error))
			$class[] = 'error';

		if ($add_empty)
			$options = [0 => ''] + $options;

		if (is_array($data)) {
			$str_data = '';
			foreach ($data as $k => $v)
				$str_data .= ' data-'.$k.'="'.$v.'" ';
		}
		else
			$str_data = $data;

		echo $before;
		echo '<div class="' . $wrapper . '">';
		if (!empty($label))
			echo '<label for="select-' . str2url($name) . '" ' . (!empty($error) ? 'class="form__message form__message--error"' : '') . '>' . drawLabelRequired($label, $required) . '</label>';

		echo '<select id="select-' . str2url($name) . '" name="' . $name . '" ' . (!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . $str_data . ($required ? ' required="required"' : '') . ($disabled ? ' disabled="disabled"' : '') . '>';

		foreach ($options as $id => $value) {
			$data = isset($options_data[$id]) ? ' ' . $options_data[$id] . ' ' : null;
			echo '<option value="' . $id . '" ' . ($selected == $id ? 'selected="selected"' : '') . $data . '>' . $value . '</option>';
		}

		echo '</select>';
		echo '</div>';

		if (!empty($error))
			echo '<p class="form__message form__message--error">' . $error . '</p>';
		if (!empty($info))
			echo '<p class="form__message form__message--info">' . $info . '</p>';

		echo $after;
	}

	/**
	 * Créer un input
	 * @param param : tableau avec les paramètres pour configurer l'input
	 * 					- name : le nom du select
	 * 					- label : le label de l'input
	 * 					- type : le type de l'input (text, password, email), défaut text
	 * 					- value : la valeur de l'input
	 * 					- error : texte d'erreur éventuelle
	 * 					- info : texte d'info à afficher sous le champ
	 * 					- placeholder : la valeur du placeholder
	 * 					- class : tableau de classes à ajouter sur le select
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 * 					- required : champ obligatoire
	 * 					- disabled : champ désactivé
	 * 					- data : autre attribut (exemple data) à rajouter au select
	 */
	function drawInput($param)
	{
		$name			= !empty($param['name']) ? $param['name'] : 'default';
		$error			= !empty($param['error']) ? $param['error'] : '';
		$info			= !empty($param['info']) ? $param['info'] : '';
		$label			= !empty($param['label']) ? $param['label'] : null;
		$type			= !empty($param['type']) ? $param['type'] : 'text';
		$placeholder	= !empty($param['placeholder']) ? $param['placeholder'] : '';
		$value			= !empty($param['value']) ? $param['value'] : '';
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$data			= !empty($param['data']) ? $param['data'] : [];
		$required		= !empty($param['required']) ? true : false;
		$disabled		= !empty($param['disabled']) ? true : false;
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();
		if (!empty($error))
			$class[] = 'error';

		if (is_array($data)) {
			$str_data = '';
			foreach ($data as $k => $v)
				$str_data .= ' data-'.$k.'="'.$v.'" ';
		}
		else
			$str_data = $data;

		echo $before;
		echo '<div class="' . $wrapper . '">';
		if (!empty($label))
			echo '<label for="' . str2url('input-' . $name) . '">' . drawLabelRequired($label, $required) . '</label>';

		echo '<input type="' . $type . '" id="' . str2url('input-' . $name) . '" name="' . $name . '" ' . ($disabled ? ' disabled="disabled"' : '') .
					'value="' . $value . '" ' . (!empty($placeholder) ? 'placeholder="' . $placeholder . '"' : '') . ' ' . (!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . $str_data . ($required ? ' required="required"' : '') . ' />';

		echo '</div>';

		if (!empty($error))
			echo '<p class="form__message form__message--error">' . $error . '</p>';
		if (!empty($info))
			echo '<p class="form__message form__message--info">' . $info . '</p>';

		echo $after;
	}

	/**
	 * Créer un textarea
	 * @param param : tableau avec les paramètres pour configurer le textarea
	 * 					- name : le nom du textarea
	 * 					- label : le label du textarea
	 * 					- value : la valeur à préremplir dans le textarea
	 * 					- error : texte d'erreur éventuelle
	 * 					- info : texte d'info à afficher sous le champ
	 * 					- cols : le nombre de colonne, défaut 50
	 * 					- rows : le nombre de ligne, défaut 10
	 * 					- class : tableau de classes à ajouter sur le select
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 * 					- required : champ obligatoire
	 * 					- disabled : champ désactivé
	 * 					- data : autre attribut (exemple data) à rajouter au select
	 */
	function drawTextarea($param)
	{
		$name			= !empty($param['name']) ? $param['name'] : 'default';
		$error			= !empty($param['error']) ? $param['error'] : '';
		$info			= !empty($param['info']) ? $param['info'] : '';
		$label			= !empty($param['label']) ? $param['label'] : null;
		$rows			= !empty($param['rows']) ? $param['rows'] : '10';
		$cols			= !empty($param['cols']) ? $param['cols'] : '50';
		$value			= !empty($param['value']) ? $param['value'] : '';
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$data			= !empty($param['data']) ? $param['data'] : [];
		$required		= !empty($param['required']) ? true : false;
		$disabled		= !empty($param['disabled']) ? true : false;
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();
		if (!empty($error))
			$class[] = 'error';

		if (is_array($data)) {
			$str_data = '';
			foreach ($data as $k => $v)
				$str_data .= ' data-'.$k.'="'.$v.'" ';
		}
		else
			$str_data = $data;

		echo $before;

		echo '<div class="' . $wrapper . '">';
		if (!empty($label))
			echo '<label for="textarea-' . $name . '">' . drawLabelRequired($label, $required) . '</label>';

		echo '<textarea id="textarea-' . $name . '" name="' . $name . '" rows="' . $rows . '" cols="' . $cols . '"' . ($disabled ? ' disabled="disabled"' : '') .
				(!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . $str_data . ($required ? ' required="required"' : '') . '>' . $value . '</textarea>';

		echo '</div>';

		if (!empty($error))
			echo '<p class="form__message form__message--error">' . $error . '</p>';
		if (!empty($info))
			echo '<p class="form__message form__message--info">' . $info . '</p>';

		echo $after;
	}


	/**
	 * Créer une série de radio bouton
	 * @param param : tableau avec les paramètres pour configurer l'input
	 * 					- name : le nom des radios
	 * 					- label : le label éventuel à afficher devant l'ensemble des radios
	 * 					- options : un tableau avec en clé la valeur et en valeur le label de chaque radio
	 * 					- checked : la valeur qui correspond au radio coché
	 * 					- required : champ obligatoire
	 * 					- error : texte d'erreur éventuelle
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 */
	function drawRadio($param)
	{
		$name 	         = !empty($param['name']) ? $param['name'] : 'default';
		$label 	         = !empty($param['label']) ? $param['label'] : null;
		$error 	         = !empty($param['error']) ? $param['error'] : '';
		$options         = !empty($param['options']) ? $param['options'] : array();
		$checked         = !empty($param['checked']) ? $param['checked'] : '';
		$required		 = !empty($param['required']) ? true : false;
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before          = !empty($param['before']) ? $param['before'] : '';
		$after 	         = !empty($param['after']) ? $param['after'] : '';
		$class 	         = !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();
		if (!empty($error))
			$class[] = 'error';

		$class[] = 'label--radio';

		echo $before;
		echo '<div class="' . $wrapper . '">';

		if (!empty($label))
			echo '<label>' . drawLabelRequired($label, $required) . '</label>';

		foreach ($options as $v => $label) {
			echo '<label for="radio-' . $name . '-' . str2url($v) . '" ' .  (!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . '>' .
					'<input type="radio" name="' . $name . '" id="radio-' . $name . '-' . str2url($v) . '"  value="' . $v . '" ' . ($checked == $v ? 'checked="checked"' : '') . ' />' .
					$label .
				'</label>';
		}
		echo '</div>';

		if (!empty($error))
			echo '<p class="form__message form__message--error">' . $error . '</p>';

		echo $after;
	}


	/**
	 * Créer une checkbox
	 * @param param : tableau avec les paramètres pour configurer la checkbox
	 * 					- name : le nom de la checkbox
	 * 					- options : un tableau avec en clé la valeur et en valeur le label de chaque radio (le rendu n'est pas géré en tableau s'il n'y a qu'une valeur)
	 * 					- checked : un tableau avec les valeurs cochées (en valeur)
	 * 					- error : texte d'erreur éventuelle
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 */
	function drawCheckbox($param)
	{
		$name			= !empty($param['name']) ? $param['name'] : 'default';
		$error			= !empty($param['error']) ? $param['error'] : '';
		$options		= !empty($param['options']) ? $param['options'] : array();
		$checked		= !empty($param['checked']) ? $param['checked'] : array();
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();
		if (!empty($error))
			$class[] = 'error';

		$class[] = 'label--radio';

		echo $before;
		echo '<div class="' . $wrapper . '">';

		foreach ($options as $v => $label) {
			echo '<label for="check-' . $name . '-' . str2url($v) . '" ' .  (!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . '>' .
					'<input type="checkbox" name="' . (count($options) > 1 ? $name . '[]' : $name) . '"
							id="check-' . $name . '-' . str2url($v) . '"  ' . ' value="' . $v . '" ' . (in_array($v, $checked) ? 'checked="checked"' : '') . ' /> '.
					$label .
				'</label>';
		}

		echo '</div>';

		if (!empty($error))
			echo '<p class="form__message form__message--error">' . $error . '</p>';

		echo $after;
	}

	/**
	* Créer un button
	* @param param : tableau avec les paramètres pour configurer l'input
	* 					- name : le nom du select
	* 					- label : le label de l'input
	* 					- type : le type de l'input (submit, cancel), défaut submit
	* 					- class : tableau de classes à ajouter sur le select
	* 					- wrapper : classe de l'élément qui englobe label + input
	* 					- before : code HTML à placer au début
	* 					- after : code HTML à placer à la fin
	* 					- disabled : champ désactivé
	* 					- data : autre attribut (exemple data) à rajouter au button
	*/
	function drawButton($param)
	{
		$name			= !empty($param['name']) ? $param['name'] : 'default-button';
		$label			= !empty($param['label']) ? $param['label'] : 'Label';
		$type			= !empty($param['type']) ? $param['type'] : 'submit';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$data			= !empty($param['data']) ? $param['data'] : [];
		$disabled		= !empty($param['disabled']) ? true : false;
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();

		if (is_array($data)) {
			$str_data = '';
			foreach ($data as $k => $v)
				$str_data .= ' data-'.$k.'="'.$v.'" ';
		}
		else
			$str_data = $data;

		echo $before;

		echo '<button type="' . $type . '" id="' . str2url('button-' . $name) . '" name="' . $name . '" ' . ($disabled ? ' disabled="disabled"' : '') .
				' ' . (!empty($class) ? 'class="' . implode(' ', $class) . '"' : '') . $str_data . '>' . $label . '</button>';

		echo $after;
	}

	/**
	 * Créer un bloc d'info (label + value)
	 * @param param : tableau avec les paramètres pour configurer l'info'
	 * 					- label : le label
	 * 					- value : le texte à afficher à côté du label
	 * 					- class : tableau de classes à ajouter sur l'info
	 * 					- wrapper : classe de l'élément qui englobe label + input
	 * 					- before : code HTML à placer au début
	 * 					- after : code HTML à placer à la fin
	 */
	function drawInfo($param)
	{
		$label			= !empty($param['label']) ? $param['label'] : 'Label';
		$value			= !empty($param['value']) ? $param['value'] : 'Info';
		$wrapper		= !empty($param['wrapper']) ? $param['wrapper'] : 'form__control';
		$before			= !empty($param['before']) ? $param['before'] : '';
		$after			= !empty($param['after']) ? $param['after'] : '';
		$class			= !empty($param['class']) ? (is_array($param['class']) ? $param['class'] : array($param['class'])) : array();

		echo $before;
		echo '<div class="' . $wrapper . '">';
		echo '<label>' . $label . '</label>';
		echo $value;
		echo '</div>';
		echo $after;
	}

	/**
	 * Retourne le label éventuellement mis à jour (si le champ est obligatoire) avec une astérisque
	 * On pourrait simplement rajouter l'astérisque en CSS avec un :after sur les champs en required, mais c'est pas très accessible comme solution
	 * @param $label    	Le label du champ
	 * @param $required 	Booléen pour définir si le champ est requis ou non
	 * @param $asterisque 	La chaîne de caractère à ajouter si c'est un champ obligatoire. Par défaut <span class="obligatoire">*</span>
	 */
	function drawLabelRequired($label, $required, $asterisque = '<span class="obligatoire"> *</span>')
	{
		if ($required)
		{
			$end = '';
			if (preg_match('/[: ]+$/', $label, $end_match))
				$end = $end_match[0];

			$init = substr($label, 0, strlen($label) - strlen($end));

			return $init . $asterisque . $end;
		}
		else
			return $label;
	}

	/**
	 * Retourne un tableau d'options à afficher dans un select
	 * @param  $array Le tableau contenant les objets à afficher dans le select
	 * @param  $key   Le champ de l'objet qui contient sa clé
	 * @param  $label Le champ de l'objet qui contient son label
	 * @param  $first_line [optionel] Si défini, sera la première valeur dans les options, avec 0 comme clé
	 */
	function array2options($array, $key, $label, $first_line = null)
	{
		$res = [];

		if (!empty($first_line))
			$res[0] = $first_line;

		foreach ($array as $row)
		{
			$res[$row->$key] = $row->$label;
		}

		return $res;
	}

<?php


	/**
	 * Charge une vue partielle, qui se trouve dans le dossier views/partials
	 * @param  string  $file   le nom du template
	 * @param  array   $data   le tableau des données à passer au template
	 * @param  boolean $return true pour retourner le rendu du template, false pour l'afficher directement. Défaut false
	 */
	function partial($file, $data = [], $return = false)
	{
		$CI = &get_instance();
		return $CI->load->view('partials' . DIRECTORY_SEPARATOR . $file, $data, $return);
	}


	
	function sql() {
		$CI = &get_instance();
		d($CI->db->last_query());
	}



	function d($key = null) {
		echo "<pre>";
		print_r($key);
	}

	function dd($key = null) {
		echo d($key);
		die;
		exit();
	}

	function vd($var = null) {
		highlight_string("<?php\n\$data =\n" . var_export($var, true) . ";\n?>");
		return;
	}

	function dv($var = null) {
		return vd();
	}
	

	function de($var = null) {
		highlight_string("<?php\n\$data =\n" . var_export($var, true) . ";\n?>");
		exit();
	}





	function passVerificationOr404($params = [])
	{
		if(!is_array($params)) {
			if(!isset($params) || !$params){
				show_404();
			}
			return true;
		}

		if(empty($params) && $params != 0 && $params != "0"){
			show_404();
		}

		foreach ($params as $oneParam) {
			if(!isset($oneParam) || !$oneParam){
				show_404();
			}
		}
		return true;
	}

	function passVerificationOrMessageExit($params = [], $message)
	{
		if(!is_array($params)) {
			if(!isset($params) || !$params){
				exit($message);
			}
			return true;
		}

		if(empty($params) && $params != 0 && $params != "0"){
			exit($message);
		}

		foreach ($params as $oneParam) {
			if(!isset($oneParam) || !$oneParam){
				exit($message);
			}
		}
		return true;
	}

	function matchVerificationOr404($params1, $params2)
	{
			if($params1 != $params2)
				show_404();

		return true;
	}
	
	function getUserIP()
	{
			//	    $client  = @$_SERVER['HTTP_CLIENT_IP'];
		    // $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
		    $remote  = $_SERVER['REMOTE_ADDR'];
		/*

		    if(filter_var($client, FILTER_VALIDATE_IP))
		    {
		        $ip = $client;
		    }
		    elseif(filter_var($forward, FILTER_VALIDATE_IP))
		    {
		        $ip = $forward;
		    }
		    */
		    	if(isset($remote)){
		        	$ip = $remote;
		    	}else {
		    		$ip = 000;
		    	}
		    

		    return $ip;
	}

	function sendEmailError($sujet, $body, $session = true, $backtrace = false, $post = true, $all = false)
	{
		$CI =& get_instance();

		$CI->load->library('email');

		$config['mailtype'] = 'html';
		$CI->email->initialize($config);

		$CI->email->from(EMAIL_DEBUG, 'Lire en Famille');
		$CI->email->to(EMAIL_APPLICATION);
		if ($all)
			$CI->email->cc(EMAIL_PAGE_CONTACT);


		$body .= '<br /><hr /><br />';
		$body .= 'URL : ' . current_url();
		$body .= '<br /><hr /><br />';
		if ($session)
			$body .= '<h3>SESSION</h3><pre>' . print_r($_SESSION, true) . '</pre><br /><hr />';
		if ($post)
			$body .= '<h3>POST</h3><pre>' . print_r($_POST, true) . '</pre><br /><hr />';
		if ($backtrace)
			$body .= '<h3>BACKTRACE</h3><br /><pre>' . print_r(debug_backtrace(), true) . '</pre>';


		$CI->email->subject('ERREUR site famille : ' . $sujet);
		$CI->email->message($body);

		return $CI->email->send();
	}

	/**
	 * Nettoie un téléphone pour être compatible avec le CRM
	 * On supprime pour cela tous les caractères parasites (autre que + et () )
	 * @param $phone
	 */
	function cleanPhone($phone)
	{
		return preg_replace('/[^0-9+\(\)]/', '', $phone);
	}

	/**
	 * Remplace les accents par leur équivalent non accentué
	 * @param  $str la chaîne à désaccentuer
	 */
	function removeAccents($str) {
		return strtr($str, array('à' => 'a', 'â' => 'a', 'À' => 'A', 'Â' => 'A', 'ç' => 'c', 'Ç' => 'C', 'É' => 'E', 'È' => 'E', 'Ê' => 'E', 'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
								'ï' => 'i', 'î' => 'i', 'Î' => 'I', 'Ï' => 'I', 'ô' => 'o', 'ö' => 'o', 'Ô' => 'O', 'Ö' => 'O', 'œ' => 'oe', 'ù' => 'u', 'û' => 'u', 'ü' => 'u', 'Ù' => 'U', 'Ü' => 'U', 'Û' => 'U'));
	}

	/**
	 * Transforme une chaine donnée pour la rendre utilisable dans une URL
	 * @param $str : la chaine à transformer
	 * @param $tolower : booléen pour forcer la casse en minuscule
	 * @return la chaine transformée
	 */
	function str2url($str, $tolower = true)
	{
		$str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
		$str = strip_tags($str);

		// on remplace les caractères accentués par leur équivalent non accentué
		$str = removeAccents($str);

		if ($tolower)
			$str = mb_strtolower($str);

		// on dégage les caractères non alphanumériques
		$str = preg_replace('/[^0-9A-Za-z\-]+/', '-', trim($str));

		// suppression des multiples -
		$str = preg_replace('/-+/', '-', $str);

		// suppression du - final
		$str = preg_replace('/-$/', '', $str);

		return $str;
	}

	/**
	 * Transforme une chaine pour virer tous les caractères non alphanumériques
	 */
	function toAlphaNum($str)
	{
		$str = str2url($str, false);

		return preg_replace('/([^A-Za-z0-9]+)/', ' ', $str);
	}

	/**
	 * Formate le prix au bon format
	 * @param  int / float $price le prix en question
	 * @param  bool $force_decimal force l'affichage des décimales sur les entiers. Défaut false
	 * @param  int $decimal le nombre de décimal à afficher
	 * @return le prix formaté
	 */
	function formatPrice($price, bool $force_decimal = false, int $decimal = 2)
	{
		if ((int)$price == $price && !$force_decimal)
			$decimal = 0;

		return number_format($price, $decimal, ',', '');
	}

	/**
	 * Construit un tableau avec ID et valeur pour utilisation avec un select / radio / checkbox, à partir d'un tableau de résultat de bdd
	 * @param  array $data le tableau de données
	 * @param  string $id le champ à utiliser comme ID
	 * @param  string $value le champ à utiliser comme valeur
	 * @return un tableau avec en clé $item->$id et en valeur $item->$value
	 */
	function buildOptions(array $data, string $id, string $value)
	{
		$res = [];
		foreach ($data as $item)
		{
			if (is_array($item))
				$res[$item[$id]] = $item[$value];
			else
				$res[$item->$id] = $item->$value;
		}

		return $res;
	}

	/**
	 * Retourne la liste des jours ou le nom du jour demandé si paramètre. 1 = lundi
	 */
	function getDayName($id = null)
	{
		$days[1] = 'Lundi';
		$days[2] = 'Mardi';
		$days[3] = 'Mercredi';
		$days[4] = 'Jeudi';
		$days[5] = 'Vendredi';
		$days[6] = 'Samedi';
		$days[7] = 'Dimanche';

		return $id ? ($days[$id] ?? null) : $days;
	}

	/**
	 * Retourne la liste des mois ou le mois demandé s'il y a un paramètre. Janvier = 1
	 */
	function getMonthName($id = null)
	{
		$months[1] = 'Janvier';
		$months[2] = 'Février';
		$months[3] = 'Mars';
		$months[4] = 'Avril';
		$months[5] = 'Mai';
		$months[6] = 'Juin';
		$months[7] = 'Juillet';
		$months[8] = 'Août';
		$months[9] = 'Septembre';
		$months[10] = 'Octobre';
		$months[11] = 'Novembre';
		$months[12] = 'Décembre';

		return $id ? ($months[$id] ?? null) : $months;
	}


	/**
	 * Tranforme une date de AAAA-MM-JJ vers JJ/MM/AAAA (ou autre selon le séparateur)
	 * @param string $str : date au format ricain
	 * @param string $sep : [optionel] caractère de séparation utilisé dans la fonction date, défaut : "/"
	 */
	function date2Aff($str, $sep = '/') {
		if ($time = strtotime($str)) {
			$format = 'd' . $sep . 'm' . $sep . 'Y';
			return date($format, $time);
		}
		else
			return $str;
	}

// tranforme une date de JJ/MM/AAAA vers AAAA-MM-JJ
// renvoie la chaine initiale si pas besoin de transformation
function date2Bdd ($str) {
	if (preg_match("#([0-9]{2})/([0-9]{2})/([0-9]{4})#", $str, $reg))
	return $reg[3].'-'.$reg[2].'-'.$reg[1];
	else
	return $str;
}



	// Pour émuler les sémaphores sous Windows
	if ( !function_exists('sem_get') ) {
		function sem_get($key) { return fopen(APPPATH.'semaphore.sem.'.$key, 'w+'); }
		function sem_acquire($sem_id) { return flock($sem_id, LOCK_EX); }
		function sem_release($sem_id) { return flock($sem_id, LOCK_UN); }
	}

	/**
	 * Change la base d'un nombre, de base 10 en base X (définie selon le paramètre $base)
	 * @param $val : le nombre à convertir dans la nouvelle base
	 * @param $base : tableau contenant les chiffres de la nouvelle base
	 * 					par exemple array(0, 1) pour convertir en base 2
	 */
	function changeBase($val, $base)
	{
		$long_base = count($base);

		// on détermine la puissance maximale
		$max = 0;
		$puissance = 0;
		while ($val >= $max) {
			$max = pow($long_base, ++$puissance);	// on additionne les puissances, ie 26^1 + 26^2 + ...
		}

		// on soustrait les multiples de puissance en partant de la plus haute
		$puissance = $puissance-1;
		$res = '';
		while ($puissance >= 0)
		{
			//echo 'Puissance : ' . $puissance .  ' /  ';
			$nb = floor($val / pow($long_base, $puissance));
			//echo ' NB : ' . $nb . ' / ';
			$val = $val - $nb * pow($long_base, $puissance);
			//echo ' val : ' . $val . '<br />';

			$res .= $base[$nb];

			$puissance--;
		}

		return $res;
	}

	/**
	 * Met au pluriel un mot si necessaire
	 * @param $str : le mot à mettre au pluriel
	 * @param $nb : le nombre, pour évaluer si c'est pluriel ou singulier
	 * @param $plur : le caractère du pluriel, "s" par défaut [optionnel]
	 * @return le mot mis au pluriel si necessaire
	 */
	function pluriel($str, $nb, $plur = 's')
	{
		if ($nb > 1)
		$str .= $plur;
		return $str;
	}

	function ucfirst_utf8($string)
	{
		$strlen = mb_strlen($string, 'utf8');
		$firstChar = mb_substr($string, 0, 1, 'utf8');
		$then = mb_substr($string, 1, $strlen - 1, 'utf8');
		return mb_strtoupper($firstChar, 'utf8') . $then;
	}

	function alphaNumeriqueCheck($string) 
	{
		if(preg_match('/^[a-zA-Z0-9áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ\'\s-]+$/', $string)){
			return true;
		}
		return false;
	}

	/**
	 * Retourne une URL avec les paramètres GET donnés
	 * @param  $url    l'URL du lien
	 * @param  $params les paramètres du lien
	 */
	function makeUrl($url, $params)
	{
		$tab = [];
		foreach ($params as $k => $v)
		{
			$tab[] = $k.'='.$v;
		}

		return $url . '?' . implode('&amp;', $tab);
	}

	/**

	function date_sort($a, $b) {
	    return strtotime($a) - strtotime($b);
	}
	 */
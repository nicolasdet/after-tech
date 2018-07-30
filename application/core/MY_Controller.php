<?php

class MY_Controller extends CI_Controller
{
	public $theme;
	public $jsCode = [];
	protected $fake_flashs = [];
	protected $connexion_needed = false;
	protected $connexion_url = 'connexion';
	protected $title = '';

	protected $tracking_active = false;
	protected $tracking_page = '';
	protected $tracking_params = [];

	

	public function __construct($layout = 'main')
	{
		parent::__construct();
 		$this->output->set_header('Access-Control-Allow-Origin: *');


		date_default_timezone_set('Europe/Paris');

		//$this->forceHttps();
		$this->initTheme($layout);

		if (ENVIRONMENT != 'production' && $this->input->get('debug') == 1)
			$this->output->enable_profiler(true);

		
		$this->loadAssets();
		$this->load->helper('form');
		//$this->load->library('session');
		
	}



	public function initTheme($layout = 'main') {

		$this->theme = new Stencil();
		$this->theme->layout($layout);
	}

	public function loadAssets()
	{
		$this->theme->css('bootstrap');
		$this->theme->css('stack-interface');
		$this->theme->css('socicon');
		$this->theme->css('lightbox.min');
		$this->theme->css('flickity');
		$this->theme->css('iconsmind');
		$this->theme->css('jquery.steps');
		$this->theme->css('theme');
		$this->theme->css('custom');
		$this->theme->css('font-rubiklato');

		$this->theme->js('jquery-3.1.1.min');
		$this->theme->js('flickity.min');
		$this->theme->js('easypiechart.min');
		$this->theme->js('parallax');
		$this->theme->js('typed.min');
		$this->theme->js('datepicker');
		$this->theme->js('isotope.min');
		$this->theme->js('ytplayer.min');
		//$this->theme->js('lightbox.min');
		$this->theme->js('granim.min');
		$this->theme->js('jquery.steps.min');
		$this->theme->js('spectragram.min');
		$this->theme->js('countdown.min');
		$this->theme->js('twitterfetcher.min');
		$this->theme->js('smooth-scroll.min');
		$this->theme->js('scripts');
		/*
*/
		//$this->theme->css('main');
		//$this->theme->js('jquery-3.2.0.min');
		//$this->theme->js('famille');

		$this->theme->css('bootstrap');
		$this->theme->css('stack-interface');
		$this->theme->css('socicon');
		$this->theme->css('lightbox.min');
		$this->theme->css('flickity');
		$this->theme->css('iconsmind');
		$this->theme->css('jquery.steps');
		$this->theme->css('theme');
		$this->theme->css('custom');
		$this->theme->css('font-rubiklato');

		$this->theme->js('jquery-3.1.1.min');
		$this->theme->js('flickity.min');
		$this->theme->js('easypiechart.min');
		$this->theme->js('parallax');
		$this->theme->js('typed.min');
		$this->theme->js('datepicker');
		$this->theme->js('isotope.min');
		$this->theme->js('ytplayer.min');
		$this->theme->js('lightbox.min');
		$this->theme->js('granim.min');
		$this->theme->js('jquery.steps.min');
		$this->theme->js('spectragram.min');
		$this->theme->js('countdown.min');
		$this->theme->js('twitterfetcher.min');
		$this->theme->js('smooth-scroll.min');
		$this->theme->js('scripts');

	}

	public function render($viewFile)
	{
		$this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate");
		$this->output->set_header("Cache-Control: post-check=0, pre-check=0");
		$this->output->set_header("Pragma: no-cache");


		$this->theme->title($this->title);

		$this->_includeSlice();
		$this->theme->paint($viewFile);
	}

	protected function _includeSlice()
	{
		$this->theme->slice(array('top', 'header', 'bottom', 'footer', 'users_top'));
	}


	protected function _addJsCode($code)
	{
		$this->jsCode[] = $code;
	}


	/**
	 * Redirige toutes les requêtes vers leur équivalence avec URL en HTTPS, si on est sur l'environnement qui va bien
	protected function forceHttps() {
		if (!is_https() && !is_cli() && FORCE_HTTPS) {

			$url = "https://" . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
			redirect($url, 'auto', 301);
			exit;
		}
	}
	 */


}

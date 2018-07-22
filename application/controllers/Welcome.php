<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {



	public function index($id = null)
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
		$this->theme->js('lightbox.min');
		$this->theme->js('granim.min');
		$this->theme->js('jquery.steps.min');
		$this->theme->js('spectragram.min');
		$this->theme->js('countdown.min');
		$this->theme->js('twitterfetcher.min');
		$this->theme->js('smooth-scroll.min');
		$this->theme->js('scripts');


		$this->render('welcome_message');
	}
}

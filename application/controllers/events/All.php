<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class All extends MY_User_Controller {
	
	public function index($id = null)
	{      


        $this->theme->data('getSearchGroupeForm', $getSearchGroupeForm);
        $this->render('events/all');
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Ajax extends MY_Ajax {


	public function __construct($layout = 'user')
	{
		parent::__construct($layout);
		$this->load->library('Chat', 'chat');
		
	}

	public function loadChat($idSalon){
		$Messages = $this->chat->loadMessageBySalon($idSalon);
		$Messages = json_encode($Messages);
		echo $Messages;
		die();
	}

	public function addMessage($idSalon, $idUser){
		$res = $this->chat->addMessageBySalon($idSalon, $idUser);
		$res = json_encode($res);
		echo $res;
		die();
	}


}

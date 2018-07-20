<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Msg {

	protected $CI;
	public static $message 	= '';

	public function __construct()
	{
		$this->CI =& get_instance();
	}

	static function addMessage($message) {
		self::$message = $message;
	}

	static function showMessage()
	{
		return self::$message;
	}

	static function showMessageOnce()
	{
		echo self::$message;
		self::$message = '';
		return;
	}
}
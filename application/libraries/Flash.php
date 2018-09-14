<?php
class Flash {

		public $error_message = '';
		protected $CI;

        public function __construct($config = array())
        {
			$this->CI =& get_instance();
			$this->CI->load->library('session');

        }

        public function setFlash($text, $type)
        {
        	$this->CI->session->set_userdata('error_message', $text);
            $this->CI->session->set_userdata('error_message_type', $type);
        }

        public function deleteFlash()
        {
            $this->session->unset_userdata('error_message');
            $this->session->unset_userdata('error_message_type');
        }
}
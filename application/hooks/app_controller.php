<?php
	function load_app_controllers() {
		spl_autoload_register(function($class) {
			if (strpos($class, 'CI_') !== 0) {
				if (is_readable(APPPATH . 'core/' . $class . '.php')) {
					require_once (APPPATH . 'core/' . $class . '.php');
				}
			}

			$traits_path = APPPATH . 'libraries/traits/';
			if (is_readable($traits_path . $class . '.php')) {
				require_once ($traits_path . $class . '.php');
			}
		});
	}

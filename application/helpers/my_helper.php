<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('isConnect'))
{
 	function isConnect()
 	{
 		if(isset($_SESSION['connected']) && $_SESSION['connected']){
 			return true;
 		}

 		return false;
 
 	}
}

?>
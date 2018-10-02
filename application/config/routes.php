<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller/(:any)'] = 'welcome/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['php_cour'] = 'php_cour';


//   Vrai route du projet Test
$route['default_controller'] 			 = 'welcome';
$route['home'] 							 = 'welcome';
$route['contribution'] 					 = 'contribution';


//groupes
$route['user/groupe'] 					 				 = 'groupe_folder/groupe_controller';
$route['user/groupe/(:num)'] 			 				 = 'groupe_folder/detail/index/$1';
$route['user/groupe/supprimer/(:num)/(:num)'] 			 = 'groupe_folder/detail/supprimer/$1/$2';

$route['user/groupe/update/(:num)'] 			 		 = 'groupe_folder/update/index/$1';
$route['user/groupe/update/do_upload/(:num)'] 		 	 = 'groupe_folder/update/do_upload/$1';
$route['user/groupe/invitation/(:num)']  				 = 'groupe_folder/detail/invitation/$1';
$route['user/groupe/invitation-groupe/(:num)']  		 = 'groupe_folder/detail/invitationGroupe/$1';
$route['user/groupe/recherche'] 		 				 = 'groupe_folder/recherche';
$route['user/groupe/recherche/all']      				 = 'groupe_folder/recherche/all';
$route['user/groupe/create'] 			 				 = 'groupe_folder/create';
$route['user/groupe/createGroupe'] 		 				 = 'groupe_folder/create/createGroupe';
$route['user/groupe/invitation'] 		 				 = 'groupe_folder/invitation';
$route['user/groupe/invitation/ok/(:num)'] 				 = 'groupe_folder/invitation/ok/$1';
$route['user/groupe/invitation/ok/(:num)/(:num)'] 		 = 'groupe_folder/invitation/ok/$1/$2';
$route['user/groupe/invitation/refuser/(:num)'] 		 = 'groupe_folder/invitation/refuser/$1';

// groupe ajax
$route['user/groupe/ajax/loadChat/(:num)'] 		 		 = 'groupe_folder/ajax/loadChat/$1';
$route['user/groupe/ajax/addMessage/(:num)/(:num)'] 	 = 'groupe_folder/ajax/addMessage/$1/$2';

$route['user/event/create/(:num)'] 			 		 	 = 'events/create/index/$1';
$route['user/event/detail/(:num)'] 			 		 	 = 'events/detail/index/$1';
$route['user/event/update/(:num)'] 			 		 	 = 'events/update/index/$1';
$route['user/event/do_upload/(:num)'] 					 = 'events/update/do_upload/$1';


//api
$route['user/groupe/create/imgUpload'] 	 = 'groupe_folder/create/img';
$route['user/groupe/create/getImgCache'] = 'groupe_folder/create/getImgCache';

//user
$route['user'] 							 = 'users/home';
$route['user/update'] 					 = 'users/update';
$route['user/update/profile'] 			 = 'users/update/profile';
$route['user/update/password'] 			 = 'users/update/password';
$route['user/update/do_upload'] 		 = 'users/update/do_upload';


// Auth
$route['inscription'] 					 = 'Auth/inscription';
$route['connexion'] 					 = 'Auth/connexion';


//Admin
$route['admin']							= 'Admin/home';

$route['admin/user/gestion']			= 'Admin/user/gestion';
$route['admin/user/change/(:num)']		= 'Admin/user/gestion/change/$1';
$route['admin/user/delete/(:num)']		= 'Admin/user/gestion/delete/$1';

$route['admin/groupe/gestion']			= 'Admin/groupe/gestion';
$route['admin/groupe/change/(:num)']	= 'Admin/groupe/gestion/change/$1';
$route['admin/groupe/delete/(:num)']	= 'Admin/groupe/gestion/delete/$1';

// event
$route['admin/event/gestion']			= 'Admin/event/gestion';
$route['admin/event/change/(:num)']		= 'Admin/event/gestion/change/$1';
$route['admin/event/delete/(:num)']		= 'Admin/event/gestion/delete/$1';
// event - ajax
$route['events/ajax/search/(:any)']				= 'events/ajax/search/index/$1';
$route['events/ajax/search/ListeEvents']		= 'events/ajax/search/ListeEvents';

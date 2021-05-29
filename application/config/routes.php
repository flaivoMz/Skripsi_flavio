<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
// ROUTES FRONTEND
$route['default_controller'] = 'general/home';
$route['vote/(:any)']="general/home/vote/$1";
$route['masuk']="general/auth/index";
$route['suara']="general/suara/index";
$route['logout']="general/auth/logout";
$route['suara/jumlah_suara']="general/suara/jumlah_suara";

// ROUTES BACKEND
$route['admin'] = "admin/auth/index";
$route['admin/logout'] = "admin/auth/logout";
$route['admin/dashboard'] = "admin/dashboard/index";
$route['admin/parpol/(:any)']['GET'] = "admin/parpol/index/$1";
$route['admin/periode/(:any)']['GET'] = "admin/periode/index/$1";
$route['admin/users/(:any)']['GET'] = "admin/users/index/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
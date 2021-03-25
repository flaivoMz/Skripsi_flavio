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
$route['default_controller'] = 'wisatawan/home';
$route['wisata']="wisatawan/wisata/index";
$route['auth']="wisatawan/auth/index";
$route['auth/daftar']="wisatawan/auth/daftar";
$route['auth/logout']="wisatawan/auth/logout";
$route['wisata/form-pesan']="wisatawan/wisata/form_pesan";
$route['wisata/pesan']="wisatawan/wisata/pesan_wisata";
$route['wisata/kategori/(:any)']['GET'] = 'wisatawan/wisata/index/$1';
$route['wisata/(:any)']['GET'] = 'wisatawan/wisata/detail_wisata/$1';

// ----- ROUTES DASHBOARD WISATAWAN

$route['account/dashboard'] = "wisatawan/dashboard/index";
$route['account/edit-password'] = "wisatawan/users/edit_password";
$route['account/list-pemandu/(:any)'] = "wisatawan/users/list_pemandu/$1";
$route['account/edit-profil'] = "wisatawan/users/edit_profil";
$route['account/batal-pesanan/(:any)'] = "wisatawan/users/batal_pesanan/$1";


// ROUTES BACKEND
$route['admin/login'] = "admin/auth/index";
$route['admin/logout'] = "admin/auth/logout";
$route['admin/dashboard'] = "admin/dashboard/index";

// -- ROUTES WISATA
$route['admin/wisata/form-wisata'] = "admin/wisata/form_wisata";
$route['admin/wisata/simpan-wisata'] = "admin/wisata/simpan_wisata";
$route['admin/wisata/(:any)']['GET'] = 'admin/wisata/form_wisata/$1';
$route['admin/wisata/hapus-wisata/(:any)']['GET'] = 'admin/wisata/hapus_wisata/$1';

// -- ROUTES PEMANDU
$route['admin/pemandu/simpan-pemandu'] = "admin/pemandu/simpan_pemandu";
$route['admin/pemandu/hapus-pemandu/(:any)']['GET'] = 'admin/pemandu/hapus_pemandu/$1';

// -- ROUTES USERS
$route['admin/users/(:any)']['GET'] = 'admin/users/index/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
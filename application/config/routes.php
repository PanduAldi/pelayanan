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
$route['default_controller'] = 'auth_controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


$route['login'] = "auth_controller/index";	
$route['login_action'] = "auth_controller/do_login";
$route['logout'] = "auth_controller/logout";

#Dashboard
$route['dashboard'] = "dashboard_controller/index";

#Setting Modul
$route['setting-pelayanan'] = "pelayanan_controller/view_pelayanan";
$route['add-pelayanan'] = "pelayanan_controller/add";
$route['edit-pelayanan'] = "pelayanan_controller/edit";
$route['delete-pelayanan'] = "pelayanan_controller/del";
$route['setting-jenis_pelayanan'] = "jenis_controller";
$route['load-pelayanan'] = "jenis_controller/load_pelayanan";
$route['add-jenis'] = "jenis_controller/add";
$route['edit-jenis'] = "jenis_controller/edit";
$route['delete-jenis'] = "jenis_controller/del";
$route['setting-persyaratan'] = "persyaratan_controller/index";
$route['add-syarat'] = "persyaratan_controller/add";
$route['delete-syarat'] = "persyaratan_controller/del";
$route['setting-user'] = "user_controller/index";
$route['add-user'] = "user_controller/add";
$route['edit-user/(:num)'] = "user_controller/edit/$1";
$route['delete-user'] = "user_controller/del";
$route['view-user/(:any)'] = "user_controller/view_user/$1";

// Pindah Datang Modul
$route['input-pindah-datang'] = 'skpd_controller/input_permohonan';
$route['skpwni'] = "skpd_controller/data_skpwni";
$route['delete-skpwni'] = "skpd_controller/del_skpwni";
$route['skdwni'] = "skpd_controller/skdwni";
$route['delete-skdwni'] = "skpd_controller/del_skdwni";
$route['skpwni-proses'] = "skpd_controller/skpwni_proses";
$route['skpwni-selesai'] = "skpd_controller/skpwni_selesai";


//Akta 
$route['input-akta'] = "akta_controller/input_akta";
$route['akta-kelahiran'] = "akta_controller/akta_kelahiran";

//KTP
$route['input-ktp'] = "ktp_controller/input_ktp";
$route['suket-ktp'] = "ktp_controller/suket_ktp";

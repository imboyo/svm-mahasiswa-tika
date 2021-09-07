<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Dashboard/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// --------------------------------------- Dont edit above
$route['admin/list/(:any)'] = 'Admin/list';
$route['admin/edit_mahasiswa/(:any)'] = 'Admin/edit_mahasiswa';
$route['admin/edit_admin/(:any)'] = 'Admin/edit_admin';
$route['API/admin/delete_admin/(:any)'] = 'API_user/delete_admin';

$route['kriteria'] = 'Dashboard/kriteria';

$route['admin/mahasiswa/list/(:any)'] = 'Admin/mahasiswa';


<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/* frontend */
$route['Home'] = 'Welcome/index';
$route['News-By-Category/(:any)'] = 'Welcome/NewsByCatID/$1';
$route['News-Details/(:any)'] = 'welcome/news_details/$1';

/*--Admin Panel--*/
$route['master']='Admin/dashboard';
$route['admin_login']='Admin/admin_login';
$route['ChangePassword']='Admin/change_password';
$route['Update-Password']='Admin/update_password';
$route['logout']='Admin/logout';
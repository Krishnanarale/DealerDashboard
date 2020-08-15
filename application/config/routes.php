<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';

// Backend routes
$route['admin'] = 'Admin/AuthController';
$route['signin'] = 'Admin/AuthController/signIn';
$route['signout'] = 'Admin/AuthController/signOut';
$route['dashboard'] = 'Admin/HomeController';
$route['dealers'] = 'Admin/DealersController';
$route['dealerPdf'] = 'Admin/DealersController/dealerApplicationPdf';
$route['dealer/(:any)/edit'] = 'Admin/DealersController/editDealer/$1';
$route['dealerPdf/(:any)'] = 'Admin/DealersController/dealerApplicationPdf/$1';

// Vild routes
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

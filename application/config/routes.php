<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'index';
// $route['admin'] = 'admin/login';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;


// --------------Website -----------
$route['child_care_homes'] = 'index/child_care_homes';
$route['child_care_home_profile/(:any)/(:any)'] = 'Index/child_care_home_profile/$1/$2';



$route['login'] = 'index/login';
$route['register'] = 'index/register';
$route['privacy-policy'] = 'Index/privacy_policy';
$route['term_of_use'] = 'Index/term_of_use';
$route['terms_condition'] = 'Index/terms_condition';
$route['refund-policy'] = 'Index/refund_policy';
$route['delivery-policy'] = 'Index/delivery_policy';

$route['returnPolicy'] = 'Index/returnPolicy';
$route['know_about_us'] = 'Index/know_about_us';

$route['login'] = 'index/login';
$route['contact'] = 'Index/contact';
$route['cart'] = 'Index/cart';
$route['gallery'] = 'Index/gallery';
$route['celebrate_with_us'] = 'Index/celebrate_with_us';

$route['my_confirmed_donation'] = 'Index/my_confirmed_donation';
$route['profile'] = 'Index/profile';
$route['my_donation'] = 'Index/my_donation';
$route['update_profile'] = 'Index/update_profile';

$route['my_celebration'] = 'Index/my_celebration';
$route['crm'] = 'Adminlogin';


// --------------merchant login -----------
$route['merchant_login'] = 'admin/merchant_login';
$route['childcare_homes_login'] = 'admin/childcare_homes_login';




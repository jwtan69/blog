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
$route['default_controller'] = 'welcome';
$route['404_override'] = 'welcome/error';
$route['translate_uri_dashes'] = FALSE;

$route['^(en|zh|cn)/phpinfo'] = 'welcome/phpinfo';

$route['^(en|zh|cn)'] = $route['default_controller'];
$route['^(en|zh|cn)/category/(:num)/(:any)'] = 'welcome/category/$2/$3';
$route['^(en|zh|cn)/category/(:num)/(:any)/(:num)'] = 'welcome/category/$2/$3/$4';

$route['^(en|zh|cn)/details/(:num)'] = 'welcome/details/$2';
$route['^(en|zh|cn)/details/(:num)/(:any)'] = 'welcome/details/$2/$3';

$route['^(en|zh|cn)/search/(:any)'] = 'welcome/search/$2';
$route['^(en|zh|cn)/search/(:any)/(:num)'] = 'welcome/search/$2/$3';

$route['^(en|zh|cn)/index2'] = 'welcome/index2';
$route['^(en|zh|cn)/toto'] = "welcome/toto";
$route['^(en|zh|cn)/angularJS'] = "welcome/angularJS";
$route['^(en|zh|cn)/todoJson'] = "welcome/todoJson";
$route['^(en|zh|cn)/crontab'] = "welcome/crontab";
$route['^(en|zh|cn)/testEmail'] = "welcome/testEmail";


//app upload test
$route['^(en|zh|cn)/upload'] = "welcome/upload";
$route['^(en|zh|cn)/uploadCheck'] = "welcome/uploadCheck";
$route['^(en|zh|cn)/api/uploadCheck'] = "welcome/apiUploadCheck";
$route['^(en|zh|cn)/api/saveToken'] = "welcome/saveToken";
$route['^(en|zh|cn)/api/uploadImgs'] = "welcome/uploadImgs";

$route['^(en|zh|cn)/apitest'] = "welcome/apitest";

//upload handle
$route['^(en|zh|cn)/vo/upload_handler'] = "vo_upload_handler"; 

//VO
$route['^(en|zh|cn)/vo'] = "vo";
$route['^(en|zh|cn)/vo/login'] = "vo_login";
$route['^(en|zh|cn)/vo/profile'] = "vo_profile"; 

//Users
$route['^(en|zh|cn)/vo/users/list'] = "vo_users/index";
$route['^(en|zh|cn)/vo/users/list/(:any)/(:any)'] = "vo_users/index/$2/$3";
$route['^(en|zh|cn)/vo/users/list/(:any)/(:any)/(:num)'] = "vo_users/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/users/add'] = "vo_users/add"; 
$route['^(en|zh|cn)/vo/users/edit/(:num)'] = "vo_users/edit/$2";
$route['^(en|zh|cn)/vo/users/submit'] = "vo_users/submit"; 
$route['^(en|zh|cn)/vo/users/delete/(:num)'] = "vo_users/delete/$2";

//Articles
$route['^(en|zh|cn)/vo/article/list'] = "vo_article/index";
$route['^(en|zh|cn)/vo/article/list/(:any)/(:any)'] = "vo_article/index/$2/$3";
$route['^(en|zh|cn)/vo/article/list/(:any)/(:any)/(:num)'] = "vo_article/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/article/add'] = "vo_article/add"; 
$route['^(en|zh|cn)/vo/article/edit/(:num)'] = "vo_article/edit/$2";
$route['^(en|zh|cn)/vo/article/submit'] = "vo_article/submit"; 
$route['^(en|zh|cn)/vo/article/delete/(:num)'] = "vo_article/delete/$2";

//Settings
$route['^(en|zh|cn)/vo/settings/list'] = "vo_settings/index";
$route['^(en|zh|cn)/vo/settings/list/(:any)/(:any)'] = "vo_settings/index/$2/$3";
$route['^(en|zh|cn)/vo/settings/list/(:any)/(:any)/(:num)'] = "vo_settings/index/$2/$3/$4";
$route['^(en|zh|cn)/vo/settings/add'] = "vo_settings/add"; 
$route['^(en|zh|cn)/vo/settings/edit/(:num)'] = "vo_settings/edit/$2";
$route['^(en|zh|cn)/vo/settings/submit'] = "vo_settings/submit"; 
$route['^(en|zh|cn)/vo/settings/delete/(:num)'] = "vo_settings/delete/$2";

$route['^(en|zh|cn)/api/login'] = "api_manage/login";
$route['^(en|zh|cn)/api/logout/(:any)'] = "api_manage/logout/$2";
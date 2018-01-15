<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['country/(:any)'] = 'site/country/(:any)';
$route['job/details/(:any)'] = 'employer/job_board/details/(:any)';
$route['job/preview/(:any)'] = 'employer/job_board/preview/(:any)';
$route['job/candidate/(:any)'] = 'employer/candidate/index/(:any)';
$route['profile/company/(:any)'] = 'employer/profile/company/(:any)';
$route['profile/user/(:any)'] = 'student/profile/view_my_profile/(:any)';
// $route['user/confirm_forgot_password/(:any)'] = 'user/site/confirmForgotPassword/(:any)';
$route['home'] = 'site/home';
$route['about'] = 'site/about';
$route['services'] = 'site/services';
$route['contact'] = 'site/contact';
$route['article'] = 'site/article';
$route['login'] = 'site/user/login';
$route['signup'] = 'site/user/signup';
$route['job/search'] = 'site/job_search_result';
$route['filter'] = 'site/job_search_result/filter_get';
/*[Result] = [source]*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */
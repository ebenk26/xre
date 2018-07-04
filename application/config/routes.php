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

$route['default_controller'] 					= "welcome";
$route['404_override'] 							= '';
$route['country/(:any)'] 						= 'site/country/(:any)';
$route['job/details/(:any)'] 					= 'employer/job_board/details/(:any)';
$route['job/preview/(:any)'] 					= 'employer/job_board/preview/(:any)';
$route['job/candidate/(:any)'] 					= 'employer/candidate/index/(:any)';
$route['profile/company/(:any)/page/(:any)'] 	= 'employer/profile/company_page/$1/page/$2';
$route['profile/company/(:any)'] 				= 'employer/profile/company/(:any)';
$route['candidate/add_session'] 				= 'employer/candidate/add_session';
$route['candidate/edit_session'] 				= 'employer/candidate/edit_session';
$route['profile/user/(:any)'] 					= 'student/profile/view_my_profile/(:any)';
$route['home'] 									= 'site/main';
$route['about'] 								= 'site/main';
$route['services'] 								= 'site/main';
$route['contact'] 								= 'site/main';
$route['privacy'] 								= 'site/main';
$route['terms-of-use'] 							= 'site/main';
$route['beranda'] 								= 'site/main';
$route['tentang-kami'] 							= 'site/main';
$route['layanan'] 								= 'site/main';
$route['hubungi-kami'] 							= 'site/main';
$route['privasi'] 								= 'site/main';
$route['syarat-penggunaan'] 					= 'site/main';
$route['login'] 								= 'site/user/login';
$route['signup'] 								= 'site/user/signup';
$route['forgot_password'] 						= 'site/user/forgot_password';
$route['job/search'] 							= 'site/job_search_result';
$route['job/search/(:any)'] 					= 'site/job_search_result';
$route['home/job/search'] 						= 'site/job_search_result';
$route['filter'] 								= 'site/job_search_result/filter_get';
$route['employer/change_password'] 				= 'site/user/changePassword';
$route['student/change_password'] 				= 'site/user/changePassword';
$route['administrator/dashboard'] 				= 'administrator/student';
$route['article/page/(:any)'] 					= 'administrator/article/list_public_page/$1';
$route['article/(:any)'] 						= 'administrator/article/view_public/$1';
$route['article'] 								= 'administrator/article/list_public';
$route['home-article'] 							= 'administrator/article/getArticle';
$route['send_message/(:any)/new'] 				= 'administrator/inbox/view/$1/new';
$route['message/(:any)'] 						= 'administrator/inbox/view/$1';

$route['employer/inbox'] 						= 'administrator/inbox/view_list/inbox';
$route['employer/sent'] 						= 'administrator/inbox/view_list/sent';
$route['employer/trash'] 						= 'administrator/inbox/view_list/trash';
$route['student/inbox'] 						= 'administrator/inbox/view_list/inbox';
$route['student/sent'] 							= 'administrator/inbox/view_list/sent';
$route['student/trash'] 						= 'administrator/inbox/view_list/trash';
$route['jobseeker/inbox'] 						= 'administrator/inbox/view_list/inbox';
$route['jobseeker/sent'] 						= 'administrator/inbox/view_list/sent';
$route['jobseeker/trash'] 						= 'administrator/inbox/view_list/trash';

$route['notif'] 								= 'notifications/notifications/notifList';
$route['clear-notif'] 							= 'notifications/notifications/clearNotif';
$route['setLastSeenNotif'] 						= 'notifications/notifications/setLastSeenNotif';

$route['confirm_email/(:any)'] 					= 'site/confirm_email/confirmEmail/$1';
$route['instructions_change_password']			= 'site/user/instructions_change_password';
$route['change_password/(:any)']				= 'site/user/change_password/$1';
$route['expired_password']						= 'site/user/expired_password';
$route['success_change_password']				= 'site/user/success_change_password';

$route['verify_registration']					= 'site/user/verify_registration';
$route['expired_registration']					= 'site/user/expired_registration';
$route['success_registration']					= 'site/user/success_registration';
$route['sitemap\.xml'] 							= 'site/sitemap';
$route['sitemap\.xml/googlef76eea03241e86d7\.html'] 							= 'site/sitemap/gVerify';
$route['download/(:any)']				= 'site/main/downloadResume/(:any)';
/*[Result] = [source]*/
/* End of file routes.php */
/* Location: ./application/config/routes.php */
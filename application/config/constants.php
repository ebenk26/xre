<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('SALT', 'dRk_612!');
define('ASSETS', 'http://localhost/xremo/assets/');
define('CSS', ASSETS.'css');
define('JS', ASSETS.'js');
define('IMG', ASSETS.'img');

define('ASSETS_STUDENTS', ASSETS.'students/');
define('CSS_STUDENTS', ASSETS.'students/css/');
define('JS_STUDENTS', ASSETS.'students/js/');
define('IMG_STUDENTS', ASSETS.'img/student/');
define('CV_STUDENTS', ASSETS.'students/cv/');
define('ASSETS_EMPLOYER', ASSETS.'employer/');
define('CSS_EMPLOYER', ASSETS.'employer/css/');
define('JS_EMPLOYER', ASSETS.'employer/js/');
define('IMG_EMPLOYER', ASSETS.'employer/img/');
define('IMG_EMPLOYERS', ASSETS.'img/employer/');

define('USER_ROLE', '1');
define('URI_SEGMENT_PAGE', '2');
define('URI_SEGMENT_DETAIL', '3');
define('URI_SEGMENT_FORGOT_PASSWORD', '4');
define('EMAIL_SYSTEM', 'system@xremo.com');

/* End of file constants.php */
/* Location: ./application/config/constants.php */
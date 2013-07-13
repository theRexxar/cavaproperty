<?php  defined('BASEPATH') OR exit('No direct script access allowed');
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
| 	www.your-site.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://www.codeigniter.com/user_guide/general/routing.html
*/

$route['files/content/folders/(:any)/(:any)/(:any)/(:any)']	= "folders/$1/$2/$3/$4";
$route['files/content/folders/(:any)/(:any)/(:any)']		= "folders/$1/$2/$3";
$route['files/content/folders/(:any)/(:any)']				= "folders/$1/$2";
$route['files/content/folders/(:any)'] 						= "folders/$1";
$route['files/content/folders']								= "folders";

$route['files/content/wysiwyg/(:any)/(:any)/(:any)/(:any)']	= "wysiwyg/$1/$2/$3/$4";
$route['files/content/wysiwyg/(:any)/(:any)/(:any)']		= "wysiwyg/$1/$2/$3";
$route['files/content/wysiwyg/(:any)/(:any)']				= "wysiwyg/$1/$2";
$route['files/content/wysiwyg/(:any)'] 						= "wysiwyg/$1";
$route['files/content/wysiwyg']								= "wysiwyg";

$route['files/content/fileman/(:any)/(:any)/(:any)/(:any)']	= "fileman/$1/$2/$3/$4";
$route['files/content/fileman/(:any)/(:any)/(:any)']		= "fileman/$1/$2/$3";
$route['files/content/fileman/(:any)/(:any)']				= "fileman/$1/$2";
$route['files/content/fileman/(:any)'] 						= "fileman/$1";
$route['files/content/fileman']								= "fileman";

//$route['files/admin/folders(:any)?'] = 'admin_folders$1';

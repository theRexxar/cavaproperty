<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
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

$route['project/content/project_type/(:any)/(:any)/(:any)/(:any)']		= "project_type/$1/$2/$3/$4";
$route['project/content/project_type/(:any)/(:any)/(:any)']		= "project_type/$1/$2/$3";
$route['project/content/project_type/(:any)/(:any)']		= "project_type/$1/$2";
$route['project/content/project_type/(:any)'] 		= "project_type/$1";
$route['project/content/project_type']				= "project_type";

$route['project/content/project_developer/(:any)/(:any)/(:any)/(:any)']		= "project_developer/$1/$2/$3/$4";
$route['project/content/project_developer/(:any)/(:any)/(:any)']		= "project_developer/$1/$2/$3";
$route['project/content/project_developer/(:any)/(:any)']		= "project_developer/$1/$2";
$route['project/content/project_developer/(:any)'] 		= "project_developer/$1";
$route['project/content/project_developer']				= "project_developer";

$route['project/content/project_location/(:any)/(:any)/(:any)/(:any)']		= "project_location/$1/$2/$3/$4";
$route['project/content/project_location/(:any)/(:any)/(:any)']		= "project_location/$1/$2/$3";
$route['project/content/project_location/(:any)/(:any)']		= "project_location/$1/$2";
$route['project/content/project_location/(:any)'] 		= "project_location/$1";
$route['project/content/project_location']				= "project_location";

$route['project/content/project_property/(:any)/(:any)/(:any)/(:any)']		= "project_property/$1/$2/$3/$4";
$route['project/content/project_property/(:any)/(:any)/(:any)']		= "project_property/$1/$2/$3";
$route['project/content/project_property/(:any)/(:any)']		= "project_property/$1/$2";
$route['project/content/project_property/(:any)'] 		= "project_property/$1";
$route['project/content/project_property']				= "project_property";


// Front Page
$route['project/developer/(:any)'] 						= "project/developer_detail/$1";
$route['project/detail/(:any)/(:any)'] 					= "project/property_detail/$1/$2";
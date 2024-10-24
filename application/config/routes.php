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
$route['default_controller'] = 'home';
$route['admin'] = 'admin/dashboard';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['about-us'] 				= 	'page/cms/about-us';
$route['privacy-policy'] 		= 	'page/cms/privacy-policy';
$route['return-policy'] 		= 	'page/cms/return-policy';
$route['terms-of-service'] 		= 	'page/cms/terms-of-service';
$route['disclaimer'] 			= 	'page/cms/disclaimer';
$route['shipping-policy'] 		= 	'page/cms/shipping-policy';
$route['cancel-order'] 			= 	'page/cms/cancel-order';

$route["category"]												= 	"category/listing";
$route["category/(.+)"]											= 	"category/index/$1";

$route["occasion/(.+)"]											= 	"occasion/index/$1";

$route["products/add_to_cart"]									= 	"products/add_to_cart";
$route["products/payment_success"]								= 	"products/payment_success";
$route["products/SabPaisaPgResponse"]							= 	"products/SabPaisaPgResponse";
$route["products/checkout"]										= 	"products/checkout";
$route["products/billing"]										= 	"products/billing";
$route["products/billinginfo"]									= 	"products/billinginfo";
$route["products/payment"]										= 	"products/payment";
$route["products/cod"]											= 	"products/cod";
$route["products/finish"]										= 	"products/finish";
$route["products/apply_coupon"]									= 	"products/apply_coupon";
$route["products/featured_products"]							= 	"products/featured_products";
$route["products/remove_item/(.+)"]								= 	"products/remove_item/$1";
$route["products/update_cart"]									= 	"products/update_cart";
$route["products/getproduct_options_price"]						= 	"products/getproduct_options_price";
$route["products/getproduct_options_price_hidden"]				= 	"products/getproduct_options_price_hidden";
$route["products/getproduct_price"]								= 	"products/getproduct_price";
$route["products/getproduct_price_hidden"]						= 	"products/getproduct_price_hidden";
$route["products/getproduct_options"]							= 	"products/getproduct_options";
$route["products/getproduct_options_val"]						= 	"products/getproduct_options_val";
$route["products/address_book"]									= 	"products/address_book";
$route["products/add_address"]									= 	"products/add_address";
$route["products/edit_address/(.+)"]							= 	"products/edit_address/$1";
$route["products/wishlist/(.+)"]								= 	"products/wishlist/$1";
$route["products/(.+)"]											= 	"products/index/$1";

$route["news"]					= 	"news/index";
$route["news/(.+)"]				= 	"news/detail/$1";
$route["services/(.+)"]			= 	"page/services/$1";

$route["blog"]						= 	"blog/index";
$route["blog/index/(.+)"]			= 	"blog/index/$1";
$route["blog/category/(.+)"]		= 	"blog/category/$1";
$route["blog/tags/(.+)"]			= 	"blog/tags/$1";
$route["blog/(.+)"]					= 	"blog/detail/$1";

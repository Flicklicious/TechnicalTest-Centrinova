<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

//Routes get views


//Admin Side
$routes->group('admin', function($routes)
{
$routes->add('login','AdminController\Admin::login');
$routes->add('logout','AdminController\Admin::logout');
$routes->add('forgot-password', 'AdminController\Admin::forgot_password');
$routes->add('reset-password', 'AdminController\Admin::reset_password');  
});

$routes->group('admin', ['filter'=>'auth'], function ($routes)
{
$routes->add('index', 'AdminController\Admin::index');

$routes->add('list-category/input-category', 'AdminController\Admin::create_category');
$routes->get('list-menu/input-menu','AdminController\Admin::create_menu'); 
$routes->add('list-user/input-user', 'AdminController\Admin::create_user');
$routes->add('list-article/input-article', 'AdminController\Article::addArticle');

$routes->add('list-article', 'AdminController\Article::listArticle');
$routes->add('list-user', 'AdminController\Admin::list_user');

$routes->add('list-menu', 'AdminController\Admin::list_menu');
$routes->add('list-category', 'AdminController\Admin::list_category');

$routes->add('list-article/edit/(:any)', 'AdminController\Article::editArticle/$1');
$routes->add('list-comments/(:any)', 'AdminController\Article::listComment/$1');
$routes->add('edit-user/edit/(:any)', 'AdminController\Admin::editdata_user/$1');

$routes->add('update-category', 'AdminController\Admin::updateData_category');
});

//Routes proccess data
$routes->add('store-user', 'AdminController\Admin::savedata_user');
$routes->add('storeComment', 'Home::addComment');
//End of Admin Side

//User Side
$routes->add('index','Home::index');
$routes->group('index', function($routes)
{
    $routes->add('post-detail/(:any)', 'Home::postDetail/$1');
    $routes->add('about', 'Home::about');
    $routes->add('contact', 'Home::contact');
});
//End of User Side





/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

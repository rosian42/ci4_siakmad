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
// $routes->setAutoRoute(false);
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');


$routes->add('admin/logout','Admin\Admin::logout');
$routes->group('admin',['filter'=>'noauth'],function($routes){
    $routes->add('','Admin\Admin::login');
    $routes->add('login','Admin\Admin::login');
    $routes->add('lupapassword','Admin\Admin::lupapassword');
    $routes->add('resetpassword','Admin\Admin::resetpassword');
});
$routes->group('admin',['filter'=>'auth'],function($routes){
    $routes->add('sukses','Admin\Admin::sukses');
    $routes->add('dashboard','Admin\Dashboard::index');
    $routes->group('artikel',function($routes){
        $routes->add('/','Admin\Artikel::index');
        $routes->add('tambah','Admin\Artikel::tambah');
        $routes->add('tambah/(:any)','Admin\Artikel::tambah/$1');
    });
    $routes->group('page',function($routes){
        $routes->add('/','Admin\Page::index');
        $routes->add('tambah','Admin\Page::tambah');
        $routes->add('tambah/(:any)','Admin\Page::tambah/$1');
    });
    $routes->add('socials','Admin\Socials::index');
    $routes->add('akun','Admin\Akun::index');
});

$routes->add('artikel','Home::artikel');
$routes->add('agenda','Home::agenda');
$routes->add('pengumuman','Home::pengumuman');
$routes->add('galeri','Home::galeri');
$routes->add('artikel/(:segment)','Home::artikel/$1');
$routes->add('agenda/(:segment)','Home::agenda/$1');
$routes->add('pengumuman/(:segment)','Home::pengumuman/$1');
$routes->add('galeri/(:segment)','Home::galeri/$1');
$routes->add('formulir-ppdb','Ppdb::index');
//$routes->add('artikel/(:any)','Artikel::index/$1');
//$routes->add('page/(:any)','Page::index/$1');

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

<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Dashboard');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('login', 'auth::login');
$routes->post('login', 'auth::login_action');
$routes->get('logout', 'auth::logout');
$routes->get('/', 'dashboard::index', ['filter' => 'auth']);

$routes->group('kriteria',['filter' => 'auth'], function($routes){
    $routes->get('/', 'kriteria::index');
    $routes->get('create', 'kriteria::create');
    $routes->post('store', 'kriteria::store');
    $routes->get('edit/(:any)', 'kriteria::edit/$1');
    $routes->put('update/(:any)', 'kriteria::update/$1');
    $routes->delete('delete/(:any)', 'kriteria::delete/$1');
});

$routes->group('pegawai',['filter' => 'auth'], function($routes){
    $routes->get('/', 'pegawai::index');
    $routes->get('create', 'pegawai::create');
    $routes->post('store', 'pegawai::store');
    $routes->get('edit/(:any)', 'pegawai::edit/$1');
    $routes->put('update/(:any)', 'pegawai::update/$1');
    $routes->delete('delete/(:any)', 'pegawai::delete/$1');
});

$routes->group('users',['filter' => 'auth'], function($routes){
    $routes->get('/', 'users::index');
    $routes->get('create', 'users::create');
    $routes->post('store', 'users::store');
    $routes->get('edit/(:any)', 'users::edit/$1');
    $routes->put('update/(:any)', 'users::update/$1');
    $routes->delete('delete/(:any)', 'users::delete/$1');
});

$routes->group('alternatif',['filter' => 'auth'], function($routes){
    $routes->get('/', 'alternatif::index');
    $routes->get('show/(:any)', 'alternatif::show/$1');
    $routes->put('update/(:any)', 'alternatif::update/$1');
    $routes->delete('delete/(:any)', 'alternatif::delete/$1');
});
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}

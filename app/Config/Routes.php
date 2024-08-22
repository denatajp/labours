<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');


//Landing Page
$routes->get('/', 'LaboursController::index');


$routes->match(['post', 'get'], '/signup', 'LaboursController::signup');
$routes->get('/signupsuccess', 'LaboursController::signUpSuccess');
$routes->match(['post', 'get'], '/login', 'LaboursController::login');
$routes->get('/home', 'LaboursController::home');

// Lamar pekerjaan
$routes->get('/lamar/(:segment)', 'LaboursController::lamar/$1');
$routes->match(['post', 'get'], '/proseslamar/(:segment)', 'LaboursController::prosesLamar/$1');

$routes->get('/postingansaya', 'LaboursController::postinganSaya');
$routes->get('/penilaian/(:segment)', 'LaboursController::penilaian/$1');
$routes->get('/deskripsi/(:segment)', 'LaboursController::deskripsi/$1');
$routes->get('/logout', 'LaboursController::logout');

//tambah pekerjaan
$routes->match(['post', 'get'], '/tambahpekerjaan', 'LaboursController::simpan');

//melihat lift pelamar siapa aja
$routes->get('/listpelamar/(:segment)', 'LaboursController::listPelamar/$1');

//menghapus satu pekerjaan
$routes->get('/hapus/(:segment)', 'LaboursController::hapus/$1');

//mengedit pekerjaan
// $routes->get('/edit/(:segment)', 'LaboursController::edit/$1');
$routes->match(['post', 'get'], '/edit/(:segment)', 'LaboursController::edit/$1');

//profil
$routes->get('/profil', 'LaboursController::profil');

//verifikasi admin
$routes->get('/admin', 'LaboursController::admin');
$routes->get('/verifikasi', 'LaboursController::verifikasi');
$routes->match(['post', 'get'], '/verif', 'LaboursController::verif');
$routes->match(['post', 'get'], '/tolak', 'LaboursController::tolak');

//Memproses data pelamar
$routes->match(['post', 'get'], '/prosespelamar/(:segment)', 'LaboursController::prosesPelamar/$1');

//Proses nilai
$routes->match(['post', 'get'], '/prosesnilai/(:segment)', 'LaboursController::prosesNilai/$1');

$routes->match(['post', 'get'], '/search', 'LaboursController::search');





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

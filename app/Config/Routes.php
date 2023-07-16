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

# Halaman Umum

$routes->get('/', 'Home::login');
$routes->get('/login', 'Home::login');
$routes->post('/login', 'Home::loginProcess');
$routes->post('/logout', 'Home::logout');
$routes->get('/register', 'Home::register');
$routes->post('/register', 'Home::registerProcess');

# Halaman Admin
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dashboard', 'Admin::index');

$routes->get('/admin/peserta', 'Admin::pesertaPage');
$routes->get('/admin/peserta/tambah', 'Admin::addPesertaPage');
$routes->post('/admin/peserta/tambah', 'Admin::addPesertaProcess');
$routes->get('/admin/peserta/hapus/(:num)', 'Admin::deletePeserta/$1');
$routes->get('/admin/peserta/edit/(:num)', 'Admin::editPesertaPage/$1');
$routes->post('/admin/peserta/edit/(:num)', 'Admin::updatePesertaProcess/$1');

$routes->get('/admin/pelatihan', 'Admin::pelatihanPage');
$routes->get('/admin/pelatihan/tambah', 'Admin::addPelatihanPage');
$routes->post('/admin/pelatihan/tambah', 'Admin::addPelatihanProcess');
$routes->get('/admin/pelatihan/hapus/(:num)', 'Admin::deletePelatihan/$1');
$routes->get('/admin/pelatihan/edit/(:num)', 'Admin::editPelatihanPage/$1');
$routes->post('/admin/pelatihan/edit/(:num)', 'Admin::updatePelatihanProcess/$1');

$routes->get('/admin/instruktur', 'Admin::instrukturPage');
$routes->get('/admin/instruktur/tambah', 'Admin::addInstrukturPage');
$routes->post('/admin/instruktur/tambah', 'Admin::addInstrukturProcess');
$routes->get('/admin/instruktur/hapus/(:num)', 'Admin::deleteInstruktur/$1');
$routes->get('/admin/instruktur/edit/(:num)', 'Admin::editInstrukturPage/$1');
$routes->post('/admin/instruktur/edit/(:num)', 'Admin::updateInstrukturProcess/$1');

# Halaman Peserta
$routes->get('/peserta', 'Peserta::index');

# Halaman Instruktur
$routes->get('/Instruktur', 'Instruktur::index');


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

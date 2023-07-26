<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// $routes->group('', ['filter' => 'login'], function ($routes) {
// Definisikan rute yang ingin Anda lindungi di sini
$routes->get('/', 'Home::index', ['filter' => 'authenticate']);
$routes->group('register', function($routes){
    $routes->get('/', 'RegisterController::index');
    $routes->post('/', 'RegisterController::store');
});
$routes->group('login', ['filter' => 'redirectIfAuthenticated'], function ($routes) {
    $routes->get('/', 'LoginController::index');
    $routes->post('/', 'LoginController::login');
});
$routes->group('logout', function ($routes) {
    $routes->get('/', 'LogoutController::index');
});

$routes->get('/dashboard', 'Dashboard::index', ['filter' => 'authenticate']);
// $routes->get('/dashboard', 'DashboardController::index');

// Jabatan
$routes->get('jabatan', 'JabatanController::index');
$routes->get('tambah_jabatan', 'JabatanController::create');
$routes->post('jabatan/save', 'JabatanController::save');
$routes->get('jabatan/edit/(:num)', 'JabatanController::edit/$1');
$routes->post('jabatan/update/(:num)', 'JabatanController::update/$1');
$routes->get('jabatan/(:num)', 'JabatanController::delete/$1');

//unit
$routes->get('unit', 'UnitController::index');
$routes->get('tambah_unit', 'UnitController::create');
$routes->post('unit/save', 'UnitController::save');
$routes->get('unit/edit/(:num)', 'UnitController::edit/$1');
$routes->post('unit/update/(:num)', 'UnitController::update/$1');
$routes->get('unit/(:num)', 'UnitController::delete/$1');

//anggota
$routes->get('anggota', 'AnggotaController::index');
$routes->get('tambah_anggota', 'AnggotaController::create');
$routes->post('anggota/save', 'AnggotaController::save');
$routes->get('anggota/edit/(:num)', 'AnggotaController::edit/$1');
$routes->post('anggota/update/(:num)', 'AnggotaController::update/$1');
$routes->get('anggota/(:num)', 'AnggotaController::delete/$1');

//shift
$routes->get('shift', 'ShiftController::index');
$routes->get('tambah_shift', 'ShiftController::create');
$routes->post('shift/save', 'ShiftController::save');
$routes->get('shift/edit/(:num)', 'ShiftController::edit/$1');
$routes->post('shift/update/(:num)', 'ShiftController::update/$1');
$routes->get('shift/(:num)', 'ShiftController::delete/$1');

//regu
$routes->get('regu', 'ReguController::index');
$routes->get('tambah_regu', 'ReguController::create');
$routes->post('regu/save', 'ReguController::save');
$routes->get('regu/edit/(:num)', 'ReguController::edit/$1');
$routes->post('regu/update/(:num)', 'ReguController::update/$1');
$routes->get('regu/detail/(:segment)', 'ReguController::detail/$1');
$routes->get('regu/(:num)', 'ReguController::delete/$1');

//jenis mutasi
$routes->get('jenis', 'JenisController::index');
$routes->get('tambah_jenis', 'JenisController::create');
$routes->post('jenis/save', 'JenisController::save');
$routes->get('jenis/edit/(:num)', 'JenisController::edit/$1');
$routes->post('jenis/update/(:num)', 'JenisController::update/$1');
$routes->get('jenis/(:num)', 'JenisController::delete/$1');

//mutasi kegiatan
$routes->get('mutasi', 'MutasiController::index');
$routes->get('tambah_mutasi', 'MutasiController::create');
$routes->post('mutasi/save', 'MutasiController::save');
$routes->get('mutasi/edit/(:num)', 'MutasiController::edit/$1');
$routes->post('mutasi/update/(:num)', 'MutasiController::update/$1');
$routes->get('mutasi/(:num)', 'MutasiController::delete/$1');
$routes->get('mutasi/detail/(:num)', 'MutasiController::detail/$1');


//dokumentasi
$routes->get('dokumentasi', 'DokumentasiController::index');
$routes->get('tambah_dokumentasi', 'DokumentasiController::create');
$routes->post('dokumentasi/save', 'DokumentasiController::save');
$routes->get('dokumentasi/edit/(:num)', 'DokumentasiController::edit/$1');
$routes->post('dokumentasi/update/(:num)', 'DokumentasiController::update/$1');
$routes->get('dokumentasi/(:num)', 'DokumentasiController::delete/$1');
$routes->get('dokumentasi/detail/(:num)', 'DokumentasiController::detail/$1');

//berkas arsip
$routes->get('berkas', 'BerkasController::index');
$routes->get('tambah_berkas', 'BerkasController::create');
$routes->post('berkas/save', 'BerkasController::save');
$routes->get('berkas/edit/(:num)', 'BerkasController::edit/$1');
$routes->post('berkas/update/(:num)', 'BerkasController::update/$1');
$routes->get('berkas/(:num)', 'BerkasController::delete/$1');
$routes->get('berkas/detail/(:num)', 'BerkasController::detail/$1');
$routes->get('berkas/unduh/(:num)', 'BerkasController::unduh/$1');

//Akun
$routes->get('dataakun', 'AkunController::index');
$routes->get('tambah_dataakun', 'AkunController::create');
$routes->post('dataakun/save', 'AkunController::save');
$routes->get('dataakun/edit/(:num)', 'AkunController::edit/$1');
$routes->post('dataakun/update/(:num)', 'AkunController::update/$1');
$routes->get('dataakun/(:num)', 'AkunController::delete/$1');

//menu devisi
$routes->get('devisi', 'Home::show_devisi');

//menu anggota
$routes->get('anggota', 'Home::show_anggota');

//menu mutasi
$routes->get('mutasi', 'Home::show_mutasi');

//menu agenda
$routes->get('agenda', 'Home::show_agenda');

//menu dokumentasi
$routes->get('dokumentasi', 'Home::show_dokumentasi');

//menu pengguna
$routes->get('pengguna', 'Home::show_pengguna');

$routes->get('dataakun', 'Home::show_data_akun');
$routes->get('tambah_dataakun', 'Home::show_tambah_data_akun');
$routes->get('ubah_dataakun', 'Home::show_ubah_data_akun');
// Language
$routes->get('/lang/{locale}', 'Language::index');

// // Vertical Layout Pages Routes
$routes->get('layouts-light-sidebar', 'Home::show_layout_light_sidebar');
$routes->get('layouts-compact-sidebar', 'Home::show_layout_compact_sidebar');
$routes->get('layouts-icon-sidebar', 'Home::show_layout_icon_sidebar');
$routes->get('layouts-boxed', 'Home::show_layout_boxed');
$routes->get('layouts-preloader', 'Home::show_layout_preloader');
$routes->get('layouts-colored-sidebar', 'Home::show_layout_colored');

// Horizontal Layout Pages Routes
$routes->get('layouts-horizontal', 'Home::show_layouts_horizontal');
$routes->get('layouts-hori-topbar-light', 'Home::show_layouts_hori_topbar_light');
$routes->get('layouts-hori-boxed-width', 'Home::show_layouts_hori_boxed_width');
$routes->get('layouts-hori-preloader', 'Home::show_layouts_hori_preloader');
$routes->get('layouts-hori-colored-header', 'Home::show_layouts_hori_colored_header');

// Vertical and Horizontal Layout RTL and DARK Layout
$routes->get('vertical-rtl', 'Home::show_vertical_rtl');
$routes->get('vertical-dark', 'Home::show_vertical_dark');
$routes->get('horizontal-rtl', 'Home::show_horizontal_rtl');
$routes->get('horizontal-dark', 'Home::show_horizontal_dark');

// // Calender
$routes->get('calendar', 'Home::show_calendar');

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

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
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');

$routes->get('home', 'Home::index');
$routes->get('contact', 'Home::contact');
$routes->get('about', 'Home::about');
$routes->get('login', 'Home::login');

$routes->get('admin/dashboard', 'Admin::index');
$routes->get('admin/pelanggan', 'Admin::pelanggan');
$routes->get('admin/tambahpelanggan', 'Admin::tambahpelanggan');
$routes->post('admin/tambahpelanggan', 'Admin::storepelanggan');
$routes->get('admin/pelanggan/edit/(:any)', 'Admin::editpelanggan/$1');
$routes->put('admin/pelanggan/edit/(:any)', 'Admin::updatepelanggan/$1');
$routes->delete('admin/pelanggan/hapus/(:any)', 'Admin::hapuspelanggan/$1');

$routes->get('admin/gangguan', 'Admin::gangguan');
$routes->get('admin/gangguan/edit/(:any)', 'Admin::editgangguan/$1');
$routes->put('admin/gangguan/edit/(:any)', 'Admin::updategangguan/$1');

$routes->get('admin/teknisi', 'Admin::teknisi');
$routes->get('admin/tambahteknisi', 'Admin::tambahteknisi');
$routes->post('admin/tambahteknisi', 'Admin::storeteknisi');
$routes->get('admin/teknisi/edit/(:any)', 'Admin::editteknisi/$1');
$routes->put('admin/teknisi/edit/(:any)', 'Admin::updateteknisi/$1');
$routes->delete('admin/teknisi/hapus/(:any)', 'Admin::hapusteknisi/$1');

$routes->get('admin/laporan/cetak-tgl', 'Admin::formrange');
$routes->get('admin/laporan/cetak-minggu', 'Admin::formminggu');
$routes->get('admin/laporan/cetak-bulan', 'Admin::formbulan');
$routes->get('admin/laporan/cetak-tgl/(:any)/(:any)', 'Admin::cetakrange/$1/$2');
$routes->get('admin/laporan/cetak-minggu/(:any)', 'Admin::cetakminggu/$1');
$routes->get('admin/laporan/cetak-bulan/(:any)', 'Admin::cetakbulan/$1');

$routes->get('admin/product', 'Admin::product');
$routes->get('admin/tambahpaket', 'Admin::tambahpaket');
$routes->post('admin/tambahpaket', 'Admin::storepaket');
$routes->get('admin/paket/edit/(:any)', 'Admin::editpaket/$1');
$routes->put('admin/paket/edit/(:any)', 'Admin::updatepaket/$1');
$routes->delete('admin/paket/hapus/(:any)', 'Admin::hapuspaket/$1');

$routes->get('pelanggan/dashboard', 'Pelanggan::index');
$routes->get('pelanggan/gangguan', 'Pelanggan::gangguan');
$routes->post('pelanggan/laporgangguan', 'Pelanggan::storelaporan');
$routes->get('pelanggan/keluhan/edit/(:any)', 'Pelanggan::editkeluhan/$1');
$routes->put('pelanggan/keluhan/edit/(:any)', 'Pelanggan::updatekeluhan/$1');
$routes->delete('pelanggan/keluhan/hapus/(:any)', 'Pelanggan::hapuskeluhan/$1');

$routes->get('teknisi/dashboard', 'Teknisi::index');
$routes->get('teknisi/lihatgangguan', 'Teknisi::datagangguan');
$routes->get('teknisi/gangguan/edit/(:any)', 'Teknisi::editgangguan/$1');
$routes->put('teknisi/gangguan/edit/(:any)', 'Teknisi::updategangguan/$1');

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

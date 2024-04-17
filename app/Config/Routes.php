<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::autentikasi');
$routes->get('/logout', 'Login::logout');
$routes->get('/registrasi', 'RegistrasiController::index');
$routes->post('/registrasi', 'RegistrasiController::create');

$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/profil', 'ProfilController::index');
$routes->post('/profil', 'ProfilController::update');

$routes->get('/user', 'UserController::index');
$routes->post('/user', 'UserController::insertUser');
$routes->post('/user/edit', 'UserController::updateUser');
$routes->get('/user/(:num)', 'UserController::hapusUser/$1');

$routes->get('/aset', 'AsetController::index');
$routes->get('/aset/add', 'AsetController::add');
$routes->post('/aset', 'AsetController::insert');
$routes->post('/aset/edit', 'AsetController::update');
$routes->get('/aset/(:num)', 'AsetController::destroy/$1');

$routes->get('/jadwal_aktivitas', 'JadwalAktivitasController::index');
$routes->get('/jadwal_aktivitas/add', 'JadwalAktivitasController::new');
$routes->post('/jadwal_aktivitas', 'JadwalAktivitasController::create');
$routes->post('/jadwal_aktivitas/(:num)', 'JadwalAktivitasController::update/$1');

$routes->get('/lihat_jadwal', 'JadwalAktivitasController::lihatJadwal');
$routes->get('/riwayat_aktivitas', 'JadwalAktivitasController::riwayatAktivitas');

$routes->get('/jadwal_pemeliharaan/add', 'JadwalPemeliharaanController::new');
$routes->post('/jadwal_pemeliharaan', 'JadwalPemeliharaanController::create');

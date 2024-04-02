<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'Login::index');
$routes->post('/login', 'Login::autentikasi');
$routes->get('/logout', 'Login::logout');

$routes->get('/dashboard', 'DashboardController::index');

$routes->get('/user', 'UserController::index');
$routes->post('/user', 'UserController::insertUser');
$routes->post('/user/edit', 'UserController::updateUser');
$routes->get('/user/(:num)', 'UserController::hapusUser/$1');

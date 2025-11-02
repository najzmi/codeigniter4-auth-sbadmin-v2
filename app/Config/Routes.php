<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index');
$routes->get('/', 'Bo::login');
// LOGIN dan LOGOUT
$routes->match(['GET','POST'],'/login', 'Bo::login');
$routes->get('/logout', 'Bo::logout');
// DASHBOARD
$routes->get('/dashboard', 'Dashboard::index', ['filter'=>'pdnislogin']);
// USERS
$routes->group('users', ['filter'=>'pdnislogin'], function($routes) {
    $routes->get('/', 'UsersController::index');
    $routes->match(['GET','POST'], 'tambah', 'UsersController::tambah');
    $routes->match(['GET','POST'], 'edit/(:num)', 'UsersController::edit/$1');
    $routes->delete('hapus/(:num)', 'UsersController::hapus/$1');
    $routes->match(['GET','POST'], 'data_json', 'UsersController::data_json');
    //$routes->post('data_json', 'UsersController::data_json');
});

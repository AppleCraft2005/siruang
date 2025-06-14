<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('peminjaman','ListPeminjamanRuang::index');

$routes->get('login', 'Authentication::login');
$routes->post('login/auth', 'Authentication::loginauth');

$routes->get('register', 'Authentication::register');
$routes->post('register/auth', 'Authentication::registerauth');

$routes->get('forgot-pwd', 'Authentication::forgotPwdForm');
$routes->post('forgot-pwd', 'Authentication::sendResetLink');

$routes->get('reset-pwd', 'Authentication::resetPwdForm');
$routes->post('reset-pwd', 'Authentication::updatePwd');

$routes->get('logout','Authentication::logout');

$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'Admin\Dashboard::index');
    // $routes->get('peminjaman','Admin\Peminjaman::index', ['as' => 'admin_peminjaman']);
    $routes->get('peminjaman/edit/(:num)','Admin\Peminjaman::edit/$1');
    $routes->get('peminjaman/delete/(:num)', 'Admin\Peminjaman::delete/$1');
    $routes->post('peminjaman/save','Admin\Peminjaman::save');
});

$routes->group('user', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'User\Dashboard::index');
    $routes->get('peminjaman','User\Peminjaman::index');
    $routes->get('peminjaman/edit/(:num)','User\Peminjaman::edit/$1');
    $routes->get('peminjaman/delete/(:num)', 'User\Peminjaman::delete/$1');
    $routes->post('peminjaman/save','User\Peminjaman::save');
});
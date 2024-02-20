<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH
$routes->get('/', 'Siswa::index');
$routes->get('/login-siswa', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login-siswa', 'Auth::prosesloginsiswa');

// SISWA
$routes->get('/dashboard-siswa', 'Siswa::index');
$routes->get('/history-siswa', 'Siswa::history');
$routes->get('/poin-siswa', 'Siswa::poin');
$routes->get('/bootcamp-siswa', 'Siswa::bootcamp');
$routes->get('/setting-siswa', 'Siswa::setting');
$routes->post('/up-aduan', 'Siswa::postaduan');

// GURU
$routes->get('/dashboard-guru', 'Guru::index');
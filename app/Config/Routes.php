<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// AUTH
$routes->get('/', 'Landing::index');
$routes->get('/login-siswa', 'Auth::index');
$routes->get('/logout', 'Auth::logout');
$routes->post('/login-siswa', 'Auth::prosesloginsiswa');

// SISWA
$routes->get('/dashboard-siswa', 'Siswa::index');
$routes->get('/history-siswa', 'Siswa::history');
$routes->get('/poin-siswa', 'Siswa::poin');
$routes->get('/bootcamp-siswa', 'Siswa::bootcamp');
$routes->get('/setting-siswa', 'Siswa::setting');
$routes->get('/absen-harian/(:num)', 'Siswa::absen/$1');
$routes->get('history/getDataByTanggal/(:any)', 'Siswa::getDataByTanggal/$1');
$routes->post('/history-siswa', 'Siswa::history');
$routes->post('/up-aduan', 'Siswa::postaduan');
$routes->post('/isi-absen', 'Siswa::postabsen');
$routes->post('/updateprofil', 'Siswa::update');


// GURU
$routes->get('/dashboard-guru', 'Guru::index');
$routes->get('/bootcamp-guru', 'Guru::bootcamp');
$routes->get('/history-guru', 'Guru::history');
$routes->get('/input-poin', 'Guru::poin');
$routes->get('/detailsiswa', 'Guru::detailsiswa');
$routes->get('/setting-guru', 'Guru::setting');
$routes->get('/tambah-data-jurnal/(:num)', 'Guru::tambahdata/$1');
$routes->get('/detail-absen/(:num)', 'Guru::detailhistory/$1');
$routes->post('/post-jurnal', 'Guru::postjurnal');
$routes->post('/hapusjurnalterpilih', 'Guru::hapusterpilih');
$routes->post('/hapus-data', 'Guru::hapusData');
$routes->post('/update-poin', 'Guru::updatepoin');

// WALAS
$routes->get('/dashboard-walas', 'Walas::index');
$routes->get('/rekapitulasi', 'Walas::rekap');
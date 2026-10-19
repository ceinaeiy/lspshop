<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
// Jadikan Dashboard sebagai halaman utama (Root) 
$routes->get('/', 'Dashboard::index'); 

// Routes untuk Produk (CRUD) 
$routes->get('/produk', 'Produk::index'); 
$routes->get('/produk/create', 'Produk::create'); 
$routes->post('/produk/save', 'Produk::save'); 
$routes->get('/produk/edit/(:num)', 'Produk::edit/$1'); 
$routes->post('/produk/update/(:num)', 'Produk::update/$1'); 
$routes->delete('/produk/(:num)', 'Produk::delete/$1'); 

// Routes untuk Laporan 
$routes->get('/laporan', 'Laporan::index'); 
$routes->get('/laporan/cetak_produk', 'Laporan::cetak_produk'); 

// Routes untuk Transaksi 
$routes->get('/transaksi', 'Transaksi::index'); 
$routes->get('/transaksi/create', 'Transaksi::create'); 
$routes->post('/transaksi/save', 'Transaksi::save'); 
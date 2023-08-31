<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('login', 'Auth::index');
$routes->post('login', 'Auth::login');
$routes->get('logout', 'Auth::logout');
$routes->post('apiuser', 'API::insertUser');
$routes->post('apilokasi', 'APILokasi::lokasi');
$routes->post('login', 'Auth::login');

//Logged In Routes
$routes->get('lokasi', 'Lokasi::index', ['filter' => 'admin']);
$routes->post('lokasi', 'Lokasi::detailLokasi', ['filter' => 'admin']);

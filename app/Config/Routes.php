<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('category', 'CategoryController::index');
$routes->post('category/store', 'CategoryController::store');
$routes->get('category/edit/(:num)', 'CategoryController::edit/$1');
$routes->post('category/update/(:num)', 'CategoryController::update/$1');
$routes->get('category/delete/(:num)', 'CategoryController::delete/$1');

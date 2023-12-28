<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('category', 'CategoryController::index');
$routes->post('category/add', 'CategoryController::store');
$routes->post('category/update', 'CategoryController::update');
$routes->post('category/delete', 'CategoryController::delete');

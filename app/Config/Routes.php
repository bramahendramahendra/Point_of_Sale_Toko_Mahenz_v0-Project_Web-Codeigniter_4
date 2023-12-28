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
$routes->get('category-status', 'MasterData\CategoryStatusController::index');
$routes->post('category-status/add', 'MasterData\CategoryStatusController::store');
$routes->post('category-status/update', 'MasterData\CategoryStatusController::update');
$routes->post('category-status/delete', 'MasterData\CategoryStatusController::delete');

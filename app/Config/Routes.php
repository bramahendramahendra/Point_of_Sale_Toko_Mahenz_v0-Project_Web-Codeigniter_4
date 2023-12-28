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

$routes->get('product-status', 'MasterData\ProductStatusController::index');
$routes->post('product-status/add', 'MasterData\ProductStatusController::store');
$routes->post('product-status/update', 'MasterData\ProductStatusController::update');
$routes->post('product-status/delete', 'MasterData\ProductStatusController::delete');

$routes->get('employee-status', 'MasterData\EmployeeStatusController::index');
$routes->post('employee-status/add', 'MasterData\EmployeeStatusController::store');
$routes->post('employee-status/update', 'MasterData\EmployeeStatusController::update');
$routes->post('employee-status/delete', 'MasterData\EmployeeStatusController::delete');

$routes->get('supplier-status', 'MasterData\SupplierStatusController::index');
$routes->post('supplier-status/add', 'MasterData\SupplierStatusController::store');
$routes->post('supplier-status/update', 'MasterData\SupplierStatusController::update');
$routes->post('supplier-status/delete', 'MasterData\SupplierStatusController::delete');

$routes->get('unit-status', 'MasterData\UnitStatusController::index');
$routes->post('unit-status/add', 'MasterData\UnitStatusController::store');
$routes->post('unit-status/update', 'MasterData\UnitStatusController::update');
$routes->post('unit-status/delete', 'MasterData\UnitStatusController::delete');

$routes->get('user-status', 'MasterData\UserStatusController::index');
$routes->post('user-status/add', 'MasterData\UserStatusController::store');
$routes->post('user-status/update', 'MasterData\UserStatusController::update');
$routes->post('user-status/delete', 'MasterData\UserStatusController::delete');

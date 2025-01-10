<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

// Ambil instance route bawaan CI4
$routes = Services::routes();

// -----------------------------------------------------------------------------
// Default Home Route
// -----------------------------------------------------------------------------
$routes->get('/', 'HomeController::index');

// -----------------------------------------------------------------------------
// Borrower Service Routes
// -----------------------------------------------------------------------------
$routes->get('/borrowers', 'BorrowerController::listBorrowers');
$routes->get('/borrowers/create', 'BorrowerController::createView');
$routes->post('/borrowers', 'BorrowerController::createBorrower');
$routes->post('/borrowers/borrow', 'BorrowerController::borrowBook');

// -----------------------------------------------------------------------------
// User Service Routes
// -----------------------------------------------------------------------------
$routes->get('/users/register', 'UserController::registerView');
$routes->post('/users/register', 'UserController::register');
$routes->get('/users/login', 'UserController::loginView');
$routes->post('/users/login', 'UserController::login');

$routes->get('/users/logout', 'UserController::logout');

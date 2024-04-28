<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
*/
$routes->group('', ['filter' => 'session'], static function ($routes) {
    $routes->get('/', 'CafeteiraController::index');
    $routes->get('/ligar', 'CafeteiraController::ligar');
    $routes->get('/desligar', 'CafeteiraController::desligar');
});

service('auth')->routes($routes);
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// $routes->get('usuarios', 'Usuarios::index');
// $routes->get('usuarios/new', 'Usuarios::new');

$routes->resource('usuarios', ['placeholder' => '(:num)', 'except' => 'show']);

$routes->resource('instructores', ['placeholder' => '(:num)', 'except' => 'show']);

// $routes->get('instructores', 'Instructores::index');
// $routes->get('instructores/new', 'Instructores::new');

$routes->get('clases', 'Clases::index');
$routes->get('clases/new', 'Clases::new');

$routes->get('inscripciones', 'Inscripciones::index');
$routes->get('inscripciones/new', 'Inscripciones::new');

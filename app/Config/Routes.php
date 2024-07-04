<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('usuarios', 'Usuarios::index');

$routes->get('instructores', 'Instructores::index');

$routes->get('clases', 'Clases::index');

$routes->get('inscripciones', 'Inscripciones::index');

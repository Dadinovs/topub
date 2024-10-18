<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
/*$routes->get('/', 'Home::index');*/
$routes->get('/', 'EntrepriseController::index');
$routes->get('entreprise/(:num)', 'EntrepriseController::show/$1');

$routes->get('entreprise', 'Home::entreprises');

$routes->get('dashboard', 'Dashboard::index');

$routes->get('save_entreprises', 'FormController::index');

$routes->post('saveEntreprise', 'FormController::saveEntreprise');

//$routes->post('saveEntreprise', 'Entreprise::saveEntreprise');







<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require_once($_SERVER['DOCUMENT_ROOT'] . '/Framework/core/Route.php');
include($_SERVER['DOCUMENT_ROOT'] . '/Framework/helpers/autoload.php');

$router= new Route();
$router->run();



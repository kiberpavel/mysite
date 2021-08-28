<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Core\Session\Session;
use Core\Router\Route;

$start = new Session();
$start->start();

$router = new Route();
$router->run();

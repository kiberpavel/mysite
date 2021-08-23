<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Core\Session;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


$start = new Session();
$start->start();

$router = new Core\Route();
$router->run();

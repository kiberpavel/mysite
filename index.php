<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Core\Session;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;


//$log = new Logger('name');
//$log->pushHandler(new StreamHandler('App/Log/log.log', Logger::WARNING));
//
//// add records to the log
//$log->warning('Warning');
//$log->error('Error');

$start = new Session();
$start->start();

$router = new Core\Route();
$router->run();

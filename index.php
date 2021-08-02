<?php


error_reporting(E_ALL);
ini_set('display_errors', 'On');

//include($_SERVER['DOCUMENT_ROOT'] . '/Framework/helpers/autoload.php');
require ($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

$router= new Core\Route();
$router->run();


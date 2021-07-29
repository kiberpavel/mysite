<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

include($_SERVER['DOCUMENT_ROOT'] . '/Framework/helpers/autoload.php');

$router= new Route();
$router->run();



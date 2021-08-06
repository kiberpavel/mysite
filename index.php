<?php

error_reporting(E_ALL);
ini_set('display_errors', 'On');

require($_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php');

use Monolog\Logger;
use Monolog\Handler\StreamHandler;


//$log = new Logger('name');
//$log->pushHandler(new StreamHandler('App/Log/log.log', Logger::WARNING));
//
//// add records to the log
//$log->warning('Warning');
//$log->error('Error');

//$host = 'localhost';
//$dbname = 'butenko_db';
//$username = 'butenko';
//$password = '1000';

//try {
//    $db = Database::getConnection();
//}
//catch(PDOException $e) {
//    echo $e->getMessage();
//    exit();
//}
//echo "Подключение успешно установлено";

//$item = new Items();
//$item->selectAll();
//
//foreach ($item as $arr){
//    print_r($arr);
//        echo "<br>";
//}

$router = new Core\Route();
$router->run();

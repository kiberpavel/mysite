<?php

namespace Db;

class Database
{
    public static function getConnection()
    {
        $paramPath = $_SERVER['DOCUMENT_ROOT'] . '/App/conf/db_params.php';
        $params = include($paramPath);

        $dsn = "mysql:host={$params['host']}; dbname={$params['dbname']};";
        $db = new \PDO($dsn, $params['user'], $params['password']);

        return $db;
    }
}
//try {
//
//$dsn = "mysql:host={$params['host']}; dbname={$params['dbname']};";
//$db = new \PDO($dsn, $params['user'], $params['password']);
//return $db;
//} catch (PDOException $e) {
//    echo $e->getMessage();
//    exit();
//}
//
//    }

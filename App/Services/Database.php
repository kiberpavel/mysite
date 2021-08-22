<?php

namespace Db;

use PDO;

class Database
{
    private PDO $pdo;
    private static $instance;

    private function __construct()
    {
        $dbOptions = $_SERVER['DOCUMENT_ROOT'] . '/App/conf/db_params.php';
        $params = include($dbOptions);

        $this->pdo = new \PDO(
            'mysql:host=' . $params['host'] . ';dbname=' . $params['dbname'],
            $params['user'],
            $params['password']
        );
        $this->pdo->exec('SET NAMES UTF8');
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass'): ?array
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if (false === $result) {
            return null;
        }

        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    public static function getInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
    public function getLastInsertId(): int
    {
        return (int) $this->pdo->lastInsertId();
    }
}

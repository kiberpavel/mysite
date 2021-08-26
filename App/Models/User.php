<?php

namespace Models;

use Core\ActiveRecord\ActiveRecordEntity;
use PDO;
use Db\Database;

class User extends ActiveRecordEntity
{
    public $firstName;
    public $secondName;
    public $login;
    public $password;
    public $email;
    public $status;


    public function getName(): string
    {
        return $this->firstName;
    }

    public function getSecond(): string
    {
        return $this->secondName;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public static function getUserData(string $login, string $password): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '`WHERE login = :login AND password = :password ',
            [':login' => $login, ':password' => $password],
            User::class
        );
        return $entities ? $entities[0] : null;
    }


    public static function updatePassword(string $password, string $id): void
    {
        $db = Database::getInstance();
        $db->query(
            'UPDATE `' . static::getTableName() . '` SET password = :password WHERE id = :id',
            [':id' => $id, ':password' => $password],
            User::class
        );
    }

    public static function insert(string $name, string $second_name, string $login, string $password, string $email): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'INSERT INTO `' . static::getTableName() . '` (first_name, second_name,login,password,email)
            VALUES (:name, :second_name,:login,:password,:email)',
            [':name' => $name,':second_name' => $second_name,':login' => $login,':password' => $password,':email' => $email],
            User::class
        );
        return $entities ? $entities[0] : null;
    }

    protected static function getTableName(): string
    {
        return 'users';
    }
}

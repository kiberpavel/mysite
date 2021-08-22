<?php

namespace Models;

use Core\ActiveRecordEntity;
use http\Exception\InvalidArgumentException;
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


//    public function getName(): string
//    {
//        return $this->firstName;
//    }
//
//    public function getSecond(): string
//    {
//        return $this->secondName;
//    }
//
//    public function getLogin()
//    {
//        return $this->login;
//    }
//
//    public function getPassword(): string
//    {
//        return $this->password;
//    }
//
//    public function getEmail(): string
//    {
//        return $this->email;
//    }
//
//    public function getStatus(): int
//    {
//        return $this->status;
//    }
//
//    public function setLogin(string $login): void
//    {
//        $this->login = $login;
//    }
//
//    public function setPassword(string $password): void
//    {
//        $this->password = $password;
//    }
//    public function setStatus(string $status): void
//    {
//        $this->status = $status;
//    }

    protected static function getTableName(): string
    {
        return 'Users';
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

    public static function getStatus(int $id): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'SELECT status FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }
    


//    public $user;
//    public function register($name, $second_name, $login, $password, $email)
//    {
//        $sth = self::$db->prepare("INSERT INTO Users (first_name,second_name,login,password,email)"
//                                . "VALUES (:name, :second_name, :login, :password, :email)");
//        $sth ->bindParam(':name', $name, PDO::PARAM_STR);
//        $sth ->bindParam(':second_name', $second_name, PDO::PARAM_STR);
//        $sth ->bindParam(':login', $login, PDO::PARAM_STR);
//        $sth ->bindParam(':password', $password, PDO::PARAM_STR);
//        $sth ->bindParam(':email', $email, PDO::PARAM_STR);
//        $sth->execute();
//        $this->user = $sth;
//        return $this->user;
//    }
//
//    public function getUserData($login, $password)
//    {
//        $sth = self::$db->prepare("SELECT * FROM Users WHERE login = :login AND password = :password");
//        $sth->bindParam(':login', $login, PDO::PARAM_STR);
//        $sth->bindParam(':password', $password, PDO::PARAM_STR);
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//        $sth->execute();
//        $identity = $this->user = $sth->fetch();
//        return $identity;
//    }
//    public function findById($id)
//    {
//        $sth = self::$db->prepare("SELECT * FROM Users WHERE id = :id");
//        $sth->bindParam(':id', $id, PDO::PARAM_INT);
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//        $sth->execute();
//        $this->user = $sth->fetch();
//        return $this->user;
//    }
//    public function updatePassword($password, $login)
//    {
//        $sth = self::$db->prepare("UPDATE Users SET password = :password WHERE login = :login");
//        $sth->bindParam(':password', $password, PDO::PARAM_STR);
//        $sth->bindParam(':login', $login, PDO::PARAM_STR);
//        $sth->setFetchMode(PDO::FETCH_ASSOC);
//        $sth->execute();
//        $this->user = $sth->fetch();
//        return $this->user;
//    }
}

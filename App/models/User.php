<?php

namespace Models;

use Core\Model;
use PDO;

class User extends Model
{
    public $user;
    public function register($name, $second_name, $login, $password, $email)
    {
        $sth = self::$db->prepare("INSERT INTO Users (first_name,second_name,login,password,email)"
                                . "VALUES (:name, :second_name, :login, :password, :email)");
        $sth ->bindParam(':name', $name, PDO::PARAM_STR);
        $sth ->bindParam(':second_name', $second_name, PDO::PARAM_STR);
        $sth ->bindParam(':login', $login, PDO::PARAM_STR);
        $sth ->bindParam(':password', $password, PDO::PARAM_STR);
        $sth ->bindParam(':email', $email, PDO::PARAM_STR);
        $sth->execute();
        $this->user = $sth;
        return $this->user;
    }

    public function getUserData($login, $password)
    {
        $sth = self::$db->prepare("SELECT * FROM Users WHERE login = :login AND password = :password");
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $identity = $this->user = $sth->fetch();
        return $identity;
    }
    public function findById($id)
    {
        $sth = self::$db->prepare("SELECT * FROM Users WHERE id = :id");
        $sth->bindParam(':id', $id, PDO::PARAM_INT);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $this->user = $sth->fetch();
        return $this->user;
    }
    public function updatePassword($password, $login)
    {
        $sth = self::$db->prepare("UPDATE Users SET password = :password WHERE login = :login");
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $this->user = $sth->fetch();
        return $this->user;
    }
}

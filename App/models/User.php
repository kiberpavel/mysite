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

    public function checkUserData($login, $password)
    {
        $sth = self::$db->prepare("SELECT * FROM Users WHERE login = :login AND password = :password");
        $sth->bindParam(':login', $login, PDO::PARAM_STR);
        $sth->bindParam(':password', $password, PDO::PARAM_STR);
        $sth->execute();
        $identity = $this->user = $sth->fetch();
        return $identity;
    }
}

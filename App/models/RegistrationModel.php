<?php

namespace Models;

class RegistrationModel
{
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    public static function checkSecondName($second_name)
    {
        if (strlen($second_name) > 2) {
            return true;
        }
        return false;
    }
    public static function checkLogin($login)
    {
        if (strlen($login) >= 4) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        if (strlen($password) >= 4) {
            return true;
        }
        return false;
    }
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

//    public function checkType(): bool
//    {
//        if (isset($_POST['submit'])) {
//            $name = $_POST['name'];
//            $second_name = $_POST['second_name'];
//            $login = $_POST['login'];
//            $password = $_POST['password'];
//            $email = $_POST['email'];
//            return true;
//        } else {
//            return false;
//        }
//    }
}

<?php

namespace Models;

class RegistrationModel
{
    public $errors;

    public function getErrors()
    {
        return $this->errors;
    }
    public function checkName($name): bool
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    public function checkSecondName($second_name)
    {
        if (strlen($second_name) > 2) {
            return true;
        }
        return false;
    }
    public function checkLogin($login)
    {
        if (strlen($login) >= 4) {
            return true;
        }
        return false;
    }
    public function checkPassword($password)
    {
        if (strlen($password) >= 4) {
            return true;
        }
        return false;
    }
    public function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public function checkData($name, $secondName, $login, $password, $email)
    {
        if ($this->checkName($name) == false) {
            $this->errors = 'Неправильное имя';
        } elseif ($this->checkSecondName($secondName) == false) {
            $this->errors = 'Неправильная фамилия';
        } elseif ($this->checkLogin($login) == false) {
            $this->errors = 'Неправильный логин';
        } elseif ($this->checkPassword($password) == false) {
            $this->errors = 'Неправильный логин';
        } elseif ($this->checkEmail($email) == false) {
            $this->errors = 'Некоректный email';
        }
    }
}

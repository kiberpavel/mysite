<?php

namespace Models;

use Core\Model;
use Models\User;
use Core\Authentication;

class Login extends Model
{
    public $user;
    public $autentif;
    public $errors;

    public function __construct()
    {
        $this->user = new User();
        $this->autentif = new Authentication();
    }

    public function getErrors()
    {
        return $this->errors;
    }


    public function login($login, $password)
    {
        $result = false;


        $userId = $this->user->getUserData($login, md5($password));
        if ($userId == false) {
            $this->errors = "Неправильно введенные данные для входа";
        } else {
            $this->autentif->auth($userId);
            $result = true;
        }
        return $result;
    }
}

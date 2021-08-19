<?php

namespace Models;

use Core\Model;
use Models\User;
use Core\Authentication;

class LoginModel extends Model
{
    public $user;
    public $autentif;

    public function __construct()
    {
        $this->user = new User();
        $this->autentif = new Authentication();
    }

    public function login($login, $password)
    {
        $result = false;
        $errors = false;

        $userId = $this->user->getUserData($login, md5($password));

        if ($userId == false) {
            $errors[] = "Неправильно введенные данные для входа";
        } else {
            $this->autentif->auth($userId);
            $result = true;
        }
        return $result;
    }
}

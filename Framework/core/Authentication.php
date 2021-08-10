<?php

namespace Core;

use Core\Session;

class Authentication
{
    public $login;
    public $auth;

    public function __construct()
    {
    }

    public function isAuth(): bool
    {
        if ($this->auth) {
            return true;
        } else {
            return false;
        }
    }

    public function auth($userId)
    {
        $start = new Session();
        $start->start();
        $_SESSION['user'] = $userId;
    }

    public function getLogin(): string
    {
        if (isset($this->login)) {
            return $this->login;
        } else {
            return false;
        }
    }

    public function logOut(): void
    {
        $this->auth = false;
        $this->login = '';
    }
}

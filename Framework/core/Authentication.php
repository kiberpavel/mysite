<?php

namespace Core;

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

    public function auth($login, $pass): bool
    {
        if (isset($login) && isset($pass)) {
            $this->login = $login;
            $this->auth = true;
            return true;
        } else {
            return false;
        }
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

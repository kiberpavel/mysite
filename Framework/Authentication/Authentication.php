<?php

namespace Core\Authentication;

use Core\Session\Session;

class Authentication
{
    public $login;
    public $auth;



    public function isAuth(): bool
    {
        if (isset($_SESSION['user'])) {
            return true;
        } else {
            return false;
        }
    }

    public function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }

    public function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
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
        $delete = new Session();
        $delete->delete('user');

        header("Location: /");
    }

    public function getUser()
    {
        if ($this->isAuth()) {
            return $_SESSION['user'];
        }
        return false;
    }
}

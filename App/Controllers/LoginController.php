<?php

namespace Controllers;

use Core\Controller\Controller;
use Models\Login;

class LoginController extends Controller
{
    public Login $login;
    public function __construct()
    {
        parent::__construct();
        $this->login = new Login();
    }

    public function login()
    {
        if (!$this->person) {
            header("Location: /cabinet");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if ($this->login->login($login, $password)) {
                header("Location: /cabinet");
            }
            $errors = $this->login->getErrors();
        }

        $params = [
            'title' => 'Авторизация',
            'errors' => $errors,
            'person' => $this->person,
            'count' => $this->count,
            'admin' => $this->admin
        ];
        $this->view->render('login', $params);
    }

    public function logout()
    {
        $this->autentif->logOut();
    }
}

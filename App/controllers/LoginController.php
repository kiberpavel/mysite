<?php

namespace Controllers;

use Core\Controller;
use Models\LoginModel;

class LoginController extends Controller
{
    public LoginModel $login;
    public function __construct()
    {
        parent::__construct();
        $this->login = new LoginModel();
    }

    public function actionLogin()
    {
        if (!$this->person) {
            header("Location: /cabinet");
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            extract($_POST);
            if ($this->login->login($login, $password)) {
                header("Location: /cabinet");
            }
        }
        $params = [
            'title' => 'Авторизация',
            'errors' => $errors,
            'person' => $this->person,
            'count' => $this->count,
        ];
        $this->view->render('login', $params);
    }

    public function actionLogout()
    {
        $this->autentif->logOut();
    }
}

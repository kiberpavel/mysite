<?php

namespace Controllers;

use Core\Controller;
use Db\Database;
use Models\LoginModel;
use Models\RegistrationModel;
use Models\User;
use Core\Authentication;

class LoginController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionLogin()
    {
        $login = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;
    
            password_verify($password, $passHash);

//            if (RegistrationModel::checkLogin($login)) {
//                {
//                    $errors[] = 'Неправильный логин';
//                }
//            }
//
//            if (RegistrationModel::checkPassword($password)) {
//                $errors[] = 'Неккоректны пароль';
//            }

            $userId = $this->user->getUserData($login, $password);
            if ($userId == false) {
                $errors[] = "Неправильно введенные данные для входа";
            } else {
                $this->autentif->auth($userId);
                header("Location: /cabinet");
            }
        }
//        var_dump($this->user->checkUserData('pablo','1000'));
        $params = ['title' => 'Авторизация','errors' => $errors, 'person' => $this->person,'count' => $this->count];
        $this->view->render('login', $params);
        return true;
    }

    public function actionLogout()
    {
        $this->autentif->logOut();
    }
}

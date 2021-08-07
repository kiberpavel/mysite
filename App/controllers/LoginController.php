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
        $db = Database::getConnection();
        $this->user = new User();
        $this->user->setDb($db);
        $this->autentif = new Authentication();
    }

    public function actionLogin()
    {
        $login = '';
        $password = '';

        if (isset($_POST['submit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            $errors = false;

            $password = md5($password . "skajhagkbgw");

            if (RegistrationModel::checkLogin($login)) {
                {
                    $errors[] = 'Неправильный логин';
                }
            }

            if (RegistrationModel::checkPassword($password)) {
                $errors[] = 'Неккоректны пароль';
            }

            $userId = $this->user->checkUserData($login, $password);
            if ($userId == false) {
                $errors[] = "Неправильно введенные данные для входа";
            } else {
                $this->autentif->auth($userId);
                header("Location: /cabinet");
            }
        }
//        var_dump($this->user->checkUserData('pablo','1000'));
        $params = ['title' => 'Авторизация'];
        $this->view->render('login', $params);
        return true;
    }
}

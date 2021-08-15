<?php

namespace Controllers;

use Core\Controller;
use Models\RegistrationModel;
use Models\User;
use Db\Database;

class RegistrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionReg()
    {
        $name = '';
        $second_name = '';
        $login = '';
        $password = '';
        $email = '';
        $result = false;

        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $second_name = $_POST['second_name'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            $errors = false;

            $password = password_hash($password, PASSWORD_BCRYPT);

//            if (!RegistrationModel::checkName($name)) {
//                $errors[] = 'Неправильное имя';
//            }
//
//            if (RegistrationModel::checkSecondName($second_name)) {
//                $errors[] = 'Неправильная фамилия';
//            }
//
//            if (RegistrationModel::checkLogin($login)) {
//                {
//                    $errors[] = 'Неправильный логин';
//                }
//            }
//
//            if (RegistrationModel::checkPassword($password)) {
//                $errors[] = 'Неккоректны пароль';
//            }
//
//            if (RegistrationModel::checkEmail($email)) {
//                $errors[] = 'Неккоректный email';
//            }

            if ($errors == false) {
                $result = $this->user->register($name, $second_name, $login, $password, $email);
            }
        }

//        $check = RegistrationModel::checkType();


        $params = ['title' => "Регистрация",'errors' => $errors,'result' => $result,
            'user' => $this->userInfo, 'person' => $this->person];
        $this->view->render('registration', $params);
        return true;
    }
}

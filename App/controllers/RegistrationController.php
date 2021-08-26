<?php

namespace Controllers;

use Core\Controller;
use Models\Registration;
use Models\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->register = new Registration();
    }

    public function actionReg()
    {
        if (!$this->person) {
            header("Location: /cabinet");
        }
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
            $password = md5($_POST['password']);
            $email = $_POST['email'];


            $this->register->checkData($name, $second_name, $login, $password, $email);

            $errors = $this->register->getErrors();

            if (!isset($errors)) {
                $result = User::insert($name, $second_name, $login, $password, $email);
            }
        }
        $params = ['title' => "Регистрация",'errors' => $errors,'result' => $result,
            'user' => $this->userInfo, 'person' => $this->person,'admin' => $this->admin];
        $this->view->render('registration', $params);
        return true;
    }
}

<?php

namespace Controllers;

use Core\Controller\Controller;
use Models\Registration;
use Models\User;

class RegistrationController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->register = new Registration();
    }

    public function reg()
    {
        if (!$this->person) {
            header("Location: /cabinet");
        }

        extract($this->register->getDataUser(), EXTR_OVERWRITE);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            extract($this->register->getFieldData(), EXTR_OVERWRITE);

            $this->register->checkData($name, $second_name, $login, $password, $email);

            $errors = $this->register->getErrors();

            if (!isset($errors)) {
                User::insert($name, $second_name, $login, $password, $email);
            }
        }
        $params = [
            'title' => "Регистрация",
            'errors' => $errors,
            'user' => $this->userInfo,
            'person' => $this->person,
            'admin' => $this->admin
        ];
        $this->view->render('registration', $params);
        return true;
    }
}

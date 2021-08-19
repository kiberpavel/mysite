<?php

namespace Controllers;

use Core\Controller;
use Core\Session;
use Db\Database;
use Models\User;

class CabinetController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionCabinet()
    {
        if ($this->person) {
            header("Location: /login");
        }
        $password = $_POST['password'];
        $password = password_hash($password, PASSWORD_BCRYPT);
        $params = ['title' => 'Личный кабинет',
            'person' => $this->person, 'user' => $this->userInfo,
            'edit' => $this->user->updatePassword($password, $this->userInfo['login']),
            'count' => $this->count ];
        $this->view->render('cabinet', $params);

        return true;
    }
}

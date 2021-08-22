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
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $password =  md5($_POST['password']) ?? 0;
            $id = $this->userInfo['id'];
            User::updatePassword($password, $id);
        }
      
        $params = ['title' => 'Личный кабинет',
            'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count ];
        $this->view->render('cabinet', $params);

        return true;
    }
}

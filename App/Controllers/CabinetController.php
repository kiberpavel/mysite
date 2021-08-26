<?php

namespace Controllers;

use Core\Controller;
use Models\Cabinet;
use Models\User;

class CabinetController extends Controller
{
    public function actionCabinet()
    {
        if ($this->person) {
            header("Location: /login");
        }
        $id = $this->userInfo['id'];
        $cabinet = new Cabinet();
        $cabinet->update($id);

        $params = ['title' => 'Личный кабинет',
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count ,
            'admin' => $this->admin
        ];
        $this->view->render('cabinet', $params);
    }
}

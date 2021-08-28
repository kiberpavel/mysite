<?php

namespace Controllers;

use Core\Controller\Controller;
use Models\Cabinet;

class CabinetController extends Controller
{
    public function cabinet()
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

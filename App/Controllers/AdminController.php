<?php

namespace Controllers;

use Core\AdminBase;
use Core\Controller;

class AdminController extends Controller
{
    public function actionAdmin()
    {
        $admin = AdminBase::checkAdmin();
        if (!$admin) {
            header("Location: /");
        }
        $params = ['title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'admin' => $admin
        ];
        $this->view->render('admin', $params);
    }
}

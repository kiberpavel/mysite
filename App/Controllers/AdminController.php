<?php

namespace Controllers;

use Core\Helpers\AdminBase;
use Core\Controller\Controller;

class AdminController extends Controller
{
    public function admin()
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

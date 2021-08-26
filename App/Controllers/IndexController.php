<?php

namespace Controllers;

use Core\Controller;

class IndexController extends Controller
{
    public function actionIndex()
    {
        $params = ['title' => 'Главная',
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'admin' => $this->admin
        ];
        $this->view->render('index', $params);
    }
}

<?php

namespace Controllers;

use Core\Controller\Controller;

class IndexController extends Controller
{
    public function index()
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

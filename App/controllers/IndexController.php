<?php

namespace Controllers;

use Core\Controller;


error_reporting(E_ALL);
ini_set('display_errors', 'On');
class IndexController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionIndex()
    {
        $params = ['title' => 'Главная',  'person' => $this->person, 'user' => $this->userInfo];
        $this->view->render('index', $params);
//        var_dump($user);
    }
}

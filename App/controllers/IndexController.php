<?php

namespace Controllers;

use Core\Authentication;
use Core\Controller;
use Models\Category;
use Models\Items;
use Models\Orders;
use Models\User;

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
        $auth = new Authentication();
    
        $userId = $auth->getUser();
        $u = User::convert( $userId);

        var_dump(  $u);
        exit();
        $params = ['title' => 'Главная',  'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count ];
        $this->view->render('index', $params);

    }
}

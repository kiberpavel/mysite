<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Models\BasketModel;

class BasketController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionBasket()
    {
        $params = ['title' => 'Корзина',  'person' => $this->person, 'user' => $this->userInfo];
        $this->view->render('basket', $params);
    }
}

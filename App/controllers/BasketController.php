<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/BasketModel.php');

class BasketController extends Controller{
    
    
    public function __construct()
    {
        $this->model = new BasketModel();
        $this->view = new View();
    }
    
    public function actionBasket(){
//        $this->pageData['title'] = "Корзина";
        $this->view->render('basket',[]);
    }
}
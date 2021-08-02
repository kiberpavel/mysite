<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\BasketModel;
class BasketController extends Controller{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->model = new BasketModel();
        $this->view = new View();
    }
    
    public function actionBasket(){
        $title = "Корзина";
        $this->view->render('basket',['title' =>$title]);
    }
}
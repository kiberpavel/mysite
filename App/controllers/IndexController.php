<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/IndexModel.php');

class IndexController extends Controller {
    
    
    public function __construct()
    {
        $this->view= new View();
        $this->model= new IndexModel();
    }

    public function actionIndex(){
        $title = "Главная";
        $this->view->render('index',['title' =>$title]);

    }
//    public function actionIndex(){
//
//        echo 'IndexController actionIndex';
//        return true;
//    }
    
}

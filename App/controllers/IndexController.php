<?php
namespace Controllers;

use Core\Controller;
use Core\View;
use Models\IndexModel;

error_reporting(E_ALL);
ini_set('display_errors', 'On');
class IndexController extends Controller {
    
    
    public function __construct()
    {
        parent::__construct();
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

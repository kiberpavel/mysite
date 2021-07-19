<?php
class IndexController extends Controller {
    
    
    public function __construct()
    {
        $this->view= new View();
//        $this->model= new IndexModel();
    }
//
    public function actionIndex(){
//        $this->pageData['title'] = "Главаня";
        $this->view->render('index',[]);

    }
//    public function actionIndex(){
//
//        echo 'IndexController actionIndex';
//        return true;
//    }
    
}

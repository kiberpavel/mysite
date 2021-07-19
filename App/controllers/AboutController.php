<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/AboutModel.php');
class AboutController extends Controller{
    
    
    public function __construct()
    {
        $this->model = new AboutModel();
        $this->view = new View();
    }
    
    public function actionAbout(){
//        $this->pageData['title'] = "О товаре";
        $this->view->render('about',[]);
    }
}

<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/CabinetModel.php');

class  CabinetController extends Controller{
    
    public function __construct()
    {
        $this->model= new CabinetModel();
        $this->view = new View();
    }
    
    public function actionCabinet(){
        $title = "Личный кабинет";
        $this->view->render('cabinet',['title' =>$title]);
    }
}

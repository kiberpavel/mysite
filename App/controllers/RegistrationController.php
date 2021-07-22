<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/RegistrationModel.php');

class  RegistrationController extends Controller{

    public function __construct()
    {
        $this->model= new RegistrationModel();
        $this->view = new View();
    }
    
    public function actionReg(){
        $title = "Регистрация";
        $this->view->render('registration',['title' =>$title]);
    }
}

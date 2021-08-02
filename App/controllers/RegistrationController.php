<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\RegistrationModel;


class  RegistrationController extends Controller{

    public function __construct()
    {
        parent::__construct();
        $this->model= new RegistrationModel();
        $this->view = new View();
    }
    
    public function actionReg(){
        $title = "Регистрация";
        $this->view->render('registration',['title' =>$title]);
    }
}

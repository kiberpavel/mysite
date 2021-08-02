<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\LoginModel;

class LoginController extends Controller{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->model = new LoginModel();
        $this->view = new View();
    }
    
    public function actionLogin(){
        $title = "Авторизация";
        $this->view->render('login',['title' =>$title]);
    }
}

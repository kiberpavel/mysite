<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/LoginModel.php');

class LoginController extends Controller{
    
    
    public function __construct()
    {
        $this->model = new LoginModel();
        $this->view = new View();
    }
    
    public function actionLogin(){
//        $this->pageData['title'] = "Авторизация";
        $this->view->render('login',[]);
    }
}

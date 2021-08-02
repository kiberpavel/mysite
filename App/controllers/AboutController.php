<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\AboutModel;

class AboutController extends Controller{
    
    
    public function __construct()
    {
        parent::__construct();
        $this->model = new AboutModel();
        $this->view = new View();
    }
    
    public function actionAbout(){
        $title = "О товаре";
        $this->view->render('about',['title' =>$title]);
    }
}

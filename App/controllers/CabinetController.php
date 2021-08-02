<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\CabinetModel;


class  CabinetController extends Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->model= new CabinetModel();
        $this->view = new View();
    }
    
    public function actionCabinet(){
        $title = "Личный кабинет";
        $this->view->render('cabinet',['title' =>$title]);
    }
}

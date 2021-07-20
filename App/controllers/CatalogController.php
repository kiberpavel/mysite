<?php

require_once ($_SERVER['DOCUMENT_ROOT'] . '/App/models/CatalogModel.php');

class CatalogController extends Controller{
    
    public $model;
    public $view;
    
    public function __construct()
    {
        $itemList = require_once($_SERVER['DOCUMENT_ROOT'] . '/Framework/conf/db.php');
//        print_r($itemList);
        $this->model = new CatalogModel($itemList);
        $this->view = new View();
    }
    
    public function actionCatalog(){
        $title = "Каталог";
            $itemList= $this->model->getProducts();
        $this->view->render('catalog',['itemList' =>$itemList, 'title' =>$title ]);
    }
}
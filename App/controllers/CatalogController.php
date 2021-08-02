<?php
namespace Controllers;
use Core\Controller;
use Core\View;
use Models\CatalogModel;
class CatalogController extends Controller{
    
    public $model;
    public $view;
    
    public function __construct()
    {
        parent::__construct();
        $itemList = require_once($_SERVER['DOCUMENT_ROOT'] . '/App/conf/db.php');
        $this->model = new CatalogModel($itemList);
        $this->view = new View();
    }
    
    public function actionCatalog(){
        $title = "Каталог";
            $itemList= $this->model->getProducts();
        $this->view->render('catalog',['itemList' =>$itemList, 'title' =>$title ]);
    }
}
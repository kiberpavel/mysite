<?php

namespace Controllers;

use Core\Controller;

class CatalogController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function actionCatalog()
    {
        $params = ['itemList' => $this->items->selectAll(),
            'categoryList' => $this->items->getCategory(), 'title' => "Каталог"];
        $this->view->render('catalog', $params);
    }
    public function actionCategory()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $params = ['itemList' => $this->items->findByCategory($category), 'title' => "Каталог"];
        $this->view->render('catalog', $params);
//        $test = $this->items->findByCategory($category);
//        var_dump($test);
    }
}

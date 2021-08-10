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
        $categoryList = $this->items->getCategory();
        $params = ['itemList' => $this->items->selectAll(),
            'categoryList' => $categoryList, 'title' => "Каталог"];
        $this->view->render('catalog', $params);
    }
    public function actionCategory()
    {
        $categoryList = $this->items->getCategory();
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $link = strtolower($category);
//        var_dump($cat);
        $params = ['itemList' => $this->items->findByCategory($category), 'title' => "Каталог",'link' => $link,'categoryList' => $categoryList];
        $this->view->render('catalog', $params);
//        $test = $this->items->findByCategory($category);
//        $test = $this->items->findByCategory($category);
//       var_dump($category);
//        var_dump($test);
    }
}

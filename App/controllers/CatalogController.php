<?php

namespace Controllers;

use Core\Controller;
use Core\Session;
use Db\Database;
use Models\BasketModel;
use Models\Category;
use Models\Items;

class CatalogController extends Controller
{
    public Items $items;
    public function __construct()
    {
        parent::__construct();
    }

    public function actionCatalog()
    {
        $list = Category::selectAll();
        $categoryList = Category::convert($list);
        $params = [
            'categoryList' => $categoryList,
            'title' => "Каталог",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count
            ];
        $this->view->render('catalog', $params);
    }
    public function actionCategory()
    {
        $list = Category::selectAll();
        $categoryList = Category::convert($list);
        $params = [
            'title' => "Каталог",
            'categoryList' => $categoryList,
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count
        ];
        $this->view->render('categories', $params);
    }
}

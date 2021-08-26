<?php

namespace Controllers;

use Core\Controller;
use Models\Category;
use Models\Items;

class CatalogController extends Controller
{
    public Items $items;

    public function actionCatalog()
    {
        $list = Category::selectAll();
        $categoryList = Category::convert($list);
        $params = [
            'categoryList' => $categoryList,
            'title' => "Каталог",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'admin' => $this->admin
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
            'count' => $this->count,
            'admin' => $this->admin
        ];
        $this->view->render('categories', $params);
    }
}

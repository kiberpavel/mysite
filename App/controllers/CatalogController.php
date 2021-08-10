<?php

namespace Controllers;

use Core\Controller;
use Db\Database;
use Models\Items;

class CatalogController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
    }

    public function actionCatalog()
    {
        $categoryList = $this->items->getCategory();
        $params = ['itemList' => $this->items->selectAll(),
            'categoryList' => $categoryList, 'title' => "Каталог", 'person' => $this->person, 'user' => $this->userInfo];
        $this->view->render('catalog', $params);
    }
    public function actionCategory()
    {
        $categoryList = $this->items->getCategory();
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $link = strtolower($category);
        $params = ['itemList' => $this->items->findByCategory($category), 'title' => "Каталог",'link' => $link,
            'categoryList' => $categoryList, 'person' => $this->person, 'user' => $this->userInfo];
        $this->view->render('catalog', $params);
    }
}

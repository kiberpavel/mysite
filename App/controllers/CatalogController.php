<?php

namespace Controllers;

use Core\Controller;
use Core\Session;
use Db\Database;
use Models\BasketModel;
use Models\Items;

class CatalogController extends Controller
{
    public Items $items;
    public function __construct()
    {
        parent::__construct();
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
    }

    public function actionCatalog()
    {
        $categoryList = $this->items->getCategories();
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
        $categoryList = $this->items->getCategories();
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

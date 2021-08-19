<?php

namespace Controllers;

use Db\Database;
use Models\Items;

class ApiController
{
    public Items $items;
    public function __construct()
    {
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
    }

    public function actionCatalog()
    {
        header('Content-Type: application/json');
        $itemList = $this->items->selectAll();
        print_r(json_encode($itemList));
    }

    public function actionCategories()
    {
        header('Content-Type: application/json');
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $itemList = $this->items->findByCategory($category);
        print_r(json_encode($itemList));
    }
}

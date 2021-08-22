<?php

namespace Controllers;

use Db\Database;
use Models\Items;

class ApiController
{
    public Items $items;
    public function __construct()
    {
    }

    public function actionCatalog()
    {
        header('Content-Type: application/json');
        $itemList = Items::selectItems();
        print_r(json_encode($itemList));
    }

    public function actionCategories()
    {
    
        
        header('Content-Type: application/json');
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $category = ucfirst(end($arrUrl));
        $itemList = Items::findByNameItems($category);
        print_r(json_encode($itemList));
    }
}

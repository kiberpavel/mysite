<?php

namespace Controllers;

use Core\Model\Model;
use Models\Items;

class ApiController
{
    public Items $items;

    public function catalog()
    {
        header('Content-Type: application/json');
        $itemList = Items::selectItems();
        print_r(json_encode($itemList));
    }

    public function categories()
    {
        header('Content-Type: application/json');
        $link = Model::cutUrl();
        $category = ucfirst($link);
        $itemList = Items::findByNameItems($category);
        print_r(json_encode($itemList));
    }
}

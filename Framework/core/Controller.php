<?php

namespace Core;

use Db\Database;
use Models\Items;

class Controller
{
    public $items;
    public $model;
    public $view;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
        $this->view = new View();
    }
}

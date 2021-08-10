<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Db\Database;
use Models\Items;

class AboutController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
    }

    public function actionAbout()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $item = $this->items->findById($id);
        extract($item, EXTR_OVERWRITE);
        $params = ['title' => "О товаре",
            'id' => $id,
            'name' => $name,
            'about' => $about,
            'photo' => $photo,
            'country' => $country,
            'brend' => $brend,
            'price' => $price,
            'person' => $this->person,
            'user' => $this->userInfo
            ];
        $this->view->render('about', $params);
    }
}

<?php

namespace Controllers;

use Core\Controller;

class AboutController extends Controller
{
    public function __construct()
    {
        parent::__construct();
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
            'price' => $price
            ];
        $this->view->render('about', $params);
    }
}

<?php

namespace Controllers;

use Core\Controller;
use Core\View;
use Db\Database;
use Models\BasketModel;
use Models\Items;

class AboutController extends Controller
{
    public Items $items;
    public function __construct()
    {
        parent::__construct();
    }

    public function actionAbout()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $list = Items::findByIdItems($id);
        $item = Items::convert($list);
        extract($item, EXTR_OVERWRITE);
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $idProduct = (int)end($newArrUrl);

        $params = ['title' => "О товаре",
            'id' => $id,
            'name' => $name,
            'about' => $about,
            'photo' => $photo,
            'country' => $country,
            'brend' => $brend,
            'price' => $price,
            'person' => $this->person,
            'user' => $this->userInfo,
            'idProduct' => $idProduct,
            'count' => $this->count ,
            'admin' => $this->admin
            ];

        $this->view->render('about', $params);
    }

    public function actionAdd()
    {
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $idProduct = (int)end($newArrUrl);
        $product = new BasketModel();
        $product->addProduct($idProduct);
        header('Location: /catalog');
    }
}

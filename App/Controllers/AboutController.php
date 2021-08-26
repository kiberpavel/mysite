<?php

namespace Controllers;

use Core\Controller;
use Core\Model;
use Core\View;
use Db\Database;
use Models\Basket;
use Models\Items;

class AboutController extends Controller
{
    public function actionAbout()
    {
        $link = Model::cutUrl();
        $id = intval($link);
        $list = Items::findByIdItems($id);
        $item = Items::convert($list);
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
            'user' => $this->userInfo,
            'count' => $this->count ,
            'admin' => $this->admin
            ];

        $this->view->render('about', $params);
    }

    public function actionAdd()
    {
        $idProduct = Model::cutUrl();
        $product = new Basket();
        $product->addProduct($idProduct);
        header('Location: /catalog');
    }
}

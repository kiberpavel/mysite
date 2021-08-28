<?php

namespace Controllers;

use Core\Controller\Controller;
use Core\Model\Model;
use Models\Basket;
use Models\Items;

class BasketController extends Controller
{
    public Items $items;

    public function basket()
    {
        $link = Model::cutUrl();
        $idProduct = intval($link);

        $basket = $this->basket->basketLogic();
        extract($basket, EXTR_OVERWRITE);

        $this->basket->insert();
        $params = [
            'title' => 'Корзина',
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'productsInCart' => $productsInCart ,
            'cart' => $cart,
            'total' => $total,
            'idProduct' => $idProduct,
            'admin' => $this->admin
        ];
        $this->view->render('basket', $params);
    }

    public function delete()
    {
        $link = Model::cutUrl();
        $id = intval($link);
        $product = new Basket();
        $product->deleteProducts($id);
        header("Location: /basket");
    }
}

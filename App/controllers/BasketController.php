<?php

namespace Controllers;

use Core\Controller;
use Models\Basket;
use Models\Items;
use Models\Orders;

class BasketController extends Controller
{
    public Items $items;
    public function __construct()
    {
        parent::__construct();
    }

    public function actionBasket()
    {
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $idProduct = (int)end($newArrUrl);
        if ($this->basket->getProductsId() !== false) {
            $productsInCart = array_count_values($this->basket->getProductsId());
            $keys = array_keys($productsInCart);
            $cart = [];
            if (!empty($keys)) {
                foreach ($keys as $key) {
                    $list = Items::findByIdItems($key);
                    $temp = Items::convert($list);
                    $temp['countCart'] = $productsInCart[$key];
                    $cart[] = $temp;
                }
                $total = $this->basket->totalPrice($cart);
            }
        } else {
            $productsInCart = [];
            $cart = [];
            $total = 0;
        }
        $countItems = [];
        foreach ($cart as $product) {
            $countItems[] = $product['countCart'];
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idUser = $this->userId;
            $idItem = array_column($cart, 'id');
            if (isset($_SESSION['products'])) {
                for ($i = 0; $i < count($idItem); $i++) {
                    $id = $idItem[$i];
                    $order = Orders::insert($idUser, $id, $countItems[$i]);
                }
                $this->basket->clear();
            }
            header("Location: /catalog");
        }
        $params = ['title' => 'Корзина',  'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'productsInCart' => $productsInCart ,'cart' => $cart,'total' => $total,
            'idProduct' => $idProduct,'admin' => $this->admin];
        $this->view->render('basket', $params);
    }

    public function actionDelete()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $product = new Basket();
        $product->deleteProducts($id);
        header("Location: /basket");
    }
}

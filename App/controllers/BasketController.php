<?php

namespace Controllers;

use Core\Controller;
use Db\Database;
use Models\BasketModel;
use Models\Items;
use Models\Orders;
use Models\User;

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

        $productsInCart = false;
        $productsInCart = $this->basket->getProductsId();
        if (!empty($productsInCart)) {
            foreach ($productsInCart as $product) {
                $list = Items::findByIdItems($product);
                $cart[] = Items::convert($list);
            }
            $total = $this->basket->totalPrice($cart, 'price');
        }



        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $this->userId;
            $id_item = array_column($cart, 'id');
            if (isset($_SESSION['products'])) {
                foreach ($id_item as $id) {
                    $id = (int) $id;
                    $order = Orders::insert($id_user, $id);
                }
                $this->basket->clear();
            }
            header("Location: /catalog");
        }

        $params = ['title' => 'Корзина',  'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'productsInCart' => $productsInCart ,'cart' => $cart,'total' => $total,
            'idProduct' => $idProduct];
        $this->view->render('basket', $params);
    }

    public function actionDelete()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $list = Items::findByIdItems($id);
        $item = Items::convert($list);
//        var_dump($item);
//        exit();
        $product = new BasketModel();
        $product->deleteProducts($id);
//        var_dump($product);
//        exit();

        header("Location: /basket");
    }
}

<?php

namespace Controllers;

use Core\Controller;
use Db\Database;
use Models\Items;
use Models\Orders;

class BasketController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $db = Database::getConnection();
        $this->items = new Items();
        $this->items->setDb($db);
        $this->order = new Orders();
    }

    public function actionBasket()
    {
        $productsInCart = false;
        $productsInCart = $this->basket->getProductsId();
//        $cart = array();
//        $total = '';
        if (!empty($productsInCart)) {
            foreach ($productsInCart as $product) :
                $cart[] = $this->items->findById($product);
            endforeach;
            $total = $this->basket->totalPrice($cart, 'price');
        }
//            var_dump($total);
//        exit();
//        var_dump($cart);
//        exit();
//        $id_item = array_column($cart, 'id');
//        var_dump($id_item);
//        exit();

        $id_user = $this->userId;

//
        if (isset($_POST['submit'])) {
            if (isset($_SESSION['products'])) {
                $this->order->insertOrder($id_user, $id_item);
                $this->basket->clear();
            } else {
                header("Location: /catalog");
            }
        }

        $params = ['title' => 'Корзина',  'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'productsInCart' => $productsInCart ,'cart' => $cart,'total' => $total];
        $this->view->render('basket', $params);
    }
}

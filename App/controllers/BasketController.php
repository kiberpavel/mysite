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
//       $p= array_count_values($this->basket->getProductsId());
//       var_dump($p);
//        exit();
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $idProduct = (int)end($newArrUrl);
        if ($this->basket->getProductsId() !== false) {
            $productsInCart = array_count_values($this->basket->getProductsId());
            $keys = array_keys($productsInCart);

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
            'idProduct' => $idProduct,'admin' => $this->admin, ];
        $this->view->render('basket', $params);
    }

    public function actionDelete()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($arrUrl);
        $product = new BasketModel();
        $product->deleteProducts($id);
        header("Location: /basket");
    }
}

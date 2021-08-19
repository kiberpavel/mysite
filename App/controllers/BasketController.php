<?php

namespace Controllers;

use Core\Controller;
use Db\Database;
use Models\Items;
use Models\Orders;

class BasketController extends Controller
{
    public Items $items;
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
        if (!empty($productsInCart)) {
            foreach ($productsInCart as $product) {
                $cart[] = $this->items->findById($product);
            }
            $total = $this->basket->totalPrice($cart, 'price');
        }
    
    
    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_user = $this->userId;
            $id_item = array_column($cart, 'id');
            if (isset($_SESSION['products'])) {
                foreach ($id_item as $id) {
                    $id = (int) $id;
                    $this->order->insertOrder($id_user, $id);
                }
                $this->basket->clear();
            }
            header("Location: /catalog");
        }

        $params = ['title' => 'Корзина',  'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'productsInCart' => $productsInCart ,'cart' => $cart,'total' => $total];
        $this->view->render('basket', $params);
    }
}

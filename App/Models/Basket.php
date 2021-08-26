<?php

namespace Models;

use Core\Authentication\Authentication;
use Core\Model\Model;
use Core\Session\Session;

class Basket extends Model
{
    public function addProduct($id)
    {
        $_SESSION['products']['id'][] = intval($id);
        $_SESSION['products']['count'] = count($_SESSION['products']['id']);
    }


    public function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products'];
        }
        return false;
    }
    public function getProductsId()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products']['id'] ?? 0;
        }
        return false;
    }
    public function getProductsCount()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products']['count'];
        }
        return false;
    }

    public function totalPrice($array)
    {
        $sum = 0;
        if (!empty($array)) {
            foreach ($array as $item) {
                $price = (int) $item['price'];
                $count = (int) $item['countCart'];
                for ($i = 0; $i < $count; $i++) {
                    $sum += $price;
                }
            }
        }
        return $sum;
    }

    public function clear(): void
    {
        if (isset($_SESSION['products'])) {
            $session = new Session();
            $session->delete('products');
        }
    }

    public function array_fill_multi(array $input)
    {
        $result = array();

        foreach ($input as $value => $count) {
            while ($count-- > 0) {
                $result[] = $value;
            }
        }

        return $result;
    }
    public function deleteProducts($id)
    {
        $productsInCart = array_count_values($this->getProductsId());
        unset($productsInCart[$id]);
        $array = $this->array_fill_multi($productsInCart);
        $_SESSION['products']['id'] = $array;
        $_SESSION['products']['count'] = count($_SESSION['products']['id']);
    }

    public function basketLogic()
    {
        $link = Model::cutUrl();
        $idProduct = intval($link);
        if ($this->getProductsId() !== false) {
            $productsInCart = array_count_values($this->getProductsId());
            $keys = array_keys($productsInCart);
            $cart = [];
            if (!empty($keys)) {
                foreach ($keys as $key) {
                    $list = Items::findByIdItems($key);
                    $temp = Items::convert($list);
                    $temp['countCart'] = $productsInCart[$key];
                    $cart[] = $temp;
                }
                $total = $this->totalPrice($cart);
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
        $array = [
            'productsInCart' => $productsInCart,
            'cart' => $cart,
            'total' => $total ?? 0,
            'countItems' => $countItems
            ];
        return $array;
    }

    public function insert(): void
    {
        $this->autentification = new Authentication();
        $this->person = $this->autentification->isGuest();
        if (!$this->person) {
            $userInfo = $this->autentification->getUser();
            $this->userId = $userInfo->getId();
            extract($this->basketLogic(), EXTR_OVERWRITE);
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $idUser = $this->userId;
            $idItem = array_column($cart, 'id');
            if (isset($_SESSION['products'])) {
                for ($i = 0; $i < count($idItem); $i++) {
                    $id = $idItem[$i];
                    $order = Orders::insert($idUser, $id, $countItems[$i]);
                }
                $this->clear();
            }
            header("Location: /catalog");
        }
    }
}

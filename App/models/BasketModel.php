<?php

namespace Models;

use Core\Model;

use Core\Session;

class BasketModel extends Model
{
    public function addProduct($id)
    {
        $_SESSION['products']['id'][] = intval($id);
        $_SESSION['products']['count'] = count($_SESSION['products']['id']);
    }


    public function getProducts()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products']['id'];
        }
        return false;
    }
    public function getProductsId()
    {
        if (isset($_SESSION['products'])) {
            return $_SESSION['products']['id'];
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

    public function totalPrice($array, $key)
    {
        if (!empty($array)) {
            $a = array_column($array, $key);
            $b = array_sum($a);
        }
        return $b;
    }

    public function clear()
    {
        if (isset($_SESSION['products'])) {
            $session = new Session();
            $session->delete('products');
        }
        }
}

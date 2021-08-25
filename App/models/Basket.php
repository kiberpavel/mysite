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

    public function clear()
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
}

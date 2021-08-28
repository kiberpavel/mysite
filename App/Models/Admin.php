<?php

namespace Models;

use Core\Model\Model;

class Admin
{
    public Photo $photo;

    public function checkOutput($model): array
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $product = Items::convert(Items::getByModel($model));
        } else {
            $product = Items::convert(Items::selectAll());
        }
        return $product;
    }

    public function getDataItems(): array
    {
        $idCategory = '';
        $model = '';
        $photo = '';
        $about = '';
        $country = '';
        $brend = '';
        $price = '';
        $count = '';

        $array = [
            'idCategory' => $idCategory,
            'model' => $model,
            'photo' => $photo,
            'about' => $about,
            'country' => $country,
            'brend' => $brend,
            'price' => $price,
            'count' => $count
        ];
        return $array;
    }

    public function insertItem($idCategory, $model, $photo, $about, $country, $brend, $price, $count): void
    {
        $this->photo = new Photo();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->photo->add();
            $idCategory = $_POST['idCategory'];
            $model = $_POST['model'];
            $photo = $this->photo->get();
            $about = $_POST['about'];
            $country = $_POST['country'];
            $brend = $_POST['brend'];
            $price = $_POST['price'];
            $count = $_POST['count'];

            Items::insert($idCategory, $model, $photo, $about, $country, $brend, $price, $count);

            header("Location: /admin/item");
        }
    }

    public function getInfoAboutItem(): array
    {
        $link = Model::cutUrl();
        $id = intval($link);
        $this->photo = new Photo();
        $product = Items::findByIdItems($id);
        $name = $product->getName();
        $idCategory = $product->getIdCategory();
        $model = $product->getModel();
        $photo = '/public/image/' . $product->getPhoto();
        $about = $product->getAbout();
        $country = $product->getCountry();
        $brend = $product->getBrend();
        $price = $product->getPrice();
        $count = $product->getCountItem();

        $array = [
            'count' => $count,
            'id' => $id,
            'idCategory' => $idCategory,
            'model' => $model,
            'photo' => $photo,
            'about' => $about,
            'country' => $country,
            'brend' => $brend,
            'price' => $price
        ];

        return $array;
    }

    public function updateItem()
    {
        extract($this->getInfoAboutItem(), EXTR_OVERWRITE);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->photo->add();
            $idCategory = $_POST['idCategory'];
            $model = $_POST['model'];
            $photo = $this->photo->get();
            $about = $_POST['about'];
            $country = $_POST['country'];
            $brend = $_POST['brend'];
            $price = $_POST['price'];
            $count = $_POST['count'];
            Items::update($id, $idCategory, $model, $photo, $about, $country, $brend, $price, $count);
            header("Location: /admin/item");
        }
    }

    public function getInfoAboutOrder(): array
    {
        $link = Model::cutUrl();
        $id = intval($link);
        $order = Orders::getById($id);
        $id = $order->getId();
        $idUser = $order->getIdUser();
        $idItem = $order->getIdItem();
        $countItems = $order->getCountItems();

        $array = [
            'id' => $id,
            'idUser' => $idUser,
            'idItem' => $idItem,
            'countItems' => $countItems
        ];
        return $array;
    }

    public function updateOrder(): void
    {
        extract($this->getInfoAboutOrder(), EXTR_OVERWRITE);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $idUser = $_POST['idUser'];
            $idItem = $_POST['idItem'];
            $countItems = $_POST['countItems'];
            Orders::update($id, $idUser, $idItem, $countItems);
            header("Location: /admin/orders");
        }
    }
}

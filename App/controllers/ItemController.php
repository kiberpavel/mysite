<?php

namespace Controllers;

use Core\AdminBase;
use Core\Controller;
use Models\Items;

class ItemController extends Controller
{
    public function actionIndex()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        $item = Items::selectAll();
//        var_dump( $item);
//        exit();

        $product = Items::convert(Items::selectAll());

        $params = ['title' => "Админпанель",'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'product' => $product,'admin' => $admin
        ];

        $this->view->render('admin_product', $params);
    }

    public function actionCreate()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        $idCategory = '';
        $model = '';
        $photo = '';
        $about = '';
        $country = '';
        $brend = '';
        $price = '';
        $count = '';

        if (isset($_POST['submit'])) {
            $idCategory = $_POST['idCategory'];
            $model = $_POST['model'];
            $photo = $_POST['photo'];
            $about = $_POST['about'];
            $country = $_POST['country'];
            $brend = $_POST['brend'];
            $price = $_POST['price'];
            $count = $_POST['count'];


            Items::insert($idCategory, $model, $photo, $about, $country, $brend, $price, $count);

            header("Location: /admin/item");
        }

        $params = ['title' => "Админпанель",'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'admin' => $admin
        ];

        $this->view->render('create', $params);
    }

    public function actionUpdate()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($newArrUrl);
        $product = Items::findByIdItems($id);
        $id = $product->getId();
        $name = $product->getName();
        $idCategory = $product->getIdCategory();
        $model = $product->getModel();
        $photo = $product->getPhoto();
        $about = $product->getAbout();
        $country = $product->getCountry();
        $brend = $product->getBrend();
        $price = $product->getPrice();
        $count = $product->getCountItem();
      
        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $count,
            'admin' => $admin,
            'id' => $id,
            'idCategory' => $idCategory,
            'model' => $model,
            'photo' => $photo,
            'about' => $about,
            'country' => $country,
            'brend' => $brend,
            'price' => $price
        ];

        $this->view->render('update', $params);
    }

    public function actionDelete()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $idProduct = (int)end($newArrUrl);

        Items::deleteProduct($idProduct);
        header("Location: /admin/item");

        $params = ['title' => "Админпанель",'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count
        ];

        $this->view->render('admin', $params);
    }
}

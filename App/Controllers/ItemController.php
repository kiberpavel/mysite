<?php

namespace Controllers;

use Core\AdminBase;
use Core\Controller;
use Core\Model;
use Models\Admin;
use Models\Items;
use Models\Photo;

class ItemController extends Controller
{
    public Admin $adminModel;

    public function __construct()
    {
        parent::__construct();
        $this->adminModel = new Admin();
    }

    public function actionIndex()
    {
        $admin = AdminBase::checkAdmin();
        $model = $_POST['model'];

        if (!$admin) {
            header("Location: /");
        }
        $product = $this->adminModel->checkOutput($model);

        $params = ['title' => 'Админпанель',
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'product' => $product,
            'admin' => $admin
        ];
        $this->view->render('admin_product', $params);
    }

    public function actionCreate()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        extract($this->adminModel->getDataItems(), EXTR_OVERWRITE);

        $this->adminModel->insertItem($idCategory, $model, $photo, $about, $country, $brend, $price, $count);

        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'admin' => $admin
        ];
        $this->view->render('create', $params);
    }

    public function actionUpdate()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        extract($this->adminModel->getInfoAboutItem(), EXTR_OVERWRITE);
        $this->adminModel->updateItem();

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
        $link = Model::cutUrl();
        $id = intval($link);
        Items::deleteProduct($id);
        header("Location: /admin/item");

        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count
        ];
        $this->view->render('admin', $params);
    }
}

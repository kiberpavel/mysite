<?php

namespace Controllers;

use Core\Helpers\AdminBase;
use Core\Controller\Controller;
use Core\Model\Model;
use Models\Admin;
use Models\Orders;

class OrderController extends Controller
{
    public Admin $adminModel;

    public function __construct()
    {
        parent::__construct();
        $this->adminModel = new Admin();
    }

    public function index()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        $orders = Orders::convert(Orders::selectAll());
        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count,
            'orders' => $orders,
            'admin' => $admin
        ];
        $this->view->render('orders_list', $params);
    }

    public function delete()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        $link = Model::cutUrl();
        $id = intval($link);
        Orders::deleteOrder($id);
        header("Location: /admin/orders");

        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'count' => $this->count
        ];

        $this->view->render('admin', $params);
    }

    public function update()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        extract($this->adminModel->getInfoAboutOrder(), EXTR_OVERWRITE);
        $this->adminModel->updateOrder();

        $params = [
            'title' => "Админпанель",
            'person' => $this->person,
            'user' => $this->userInfo,
            'admin' => $admin,
            'id' => $id,
            'idUser' => $idUser,
            'idItem' => $idItem,
            'countItems' => $countItems
        ];
        $this->view->render('update_order', $params);
    }
}

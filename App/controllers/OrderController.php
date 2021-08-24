<?php

namespace Controllers;

use Core\AdminBase;
use Core\Controller;
use Models\Items;
use Models\Orders;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        $orders = Orders::convert(Orders::selectAll());
//        var_dump($orders);
//        exit();

        $params = ['title' => "Админпанель",'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count,'orders' => $orders,'admin' => $admin
        ];

        $this->view->render('orders_list', $params);
    }

    public function actionDelete()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }
        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($newArrUrl);

        Orders::deleteOrder($id);
        header("Location: /admin/orders");

        $params = ['title' => "Админпанель",'person' => $this->person, 'user' => $this->userInfo,
            'count' => $this->count
        ];

        $this->view->render('admin', $params);
    }

    public function actionUpdate()
    {
        $admin = AdminBase::checkAdmin();

        if (!$admin) {
            header("Location: /");
        }

        $newArrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $id = (int)end($newArrUrl);
        $order = Orders::getById($id);
        $id = $order->getId();
        $idUser = $order->getIdUser();
        $idItem = $order->getIdItem();
        $countItems = $order->getCountItems();


        if (isset($_POST['submit'])) {
            $idUser = $_POST['idUser'];
            $idItem = $_POST['idItem'];
            $countItems = $_POST['countItems'];
            Orders::update($id, $idUser, $idItem, $countItems);
            header("Location: /admin/orders");
        }
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

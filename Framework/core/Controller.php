<?php

namespace Core;

use Db\Database;
use Models\Basket;
use Models\User;

class Controller
{
    public $user;
    public $model;
    public $view;
    public $userInfo;
    public $userId;
    public $person;
    public $basket;
    public $count;
    public $order;
    public $admin;

    public function __construct()
    {
        $this->autentif = new Authentication();
        $this->view = new View();
        $userInf = $this->autentif->getUser();
        $this->person = $this->autentif->isGuest();
        $this->basket = new Basket();
        $this->ses = new Session();
        $this->admin = AdminBase::checkAdmin();
        if (!$this->person) {
            $userInf = $this->autentif->getUser();
            $this->userId = $userInf->getId();
            $link = User::getById($this->userId);
            $this->userInfo = User::convert($link);
            $this->count = $this->ses->get('count', 'products') ?? 0;
        }
    }
}

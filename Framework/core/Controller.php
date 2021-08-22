<?php

namespace Core;

use Db\Database;
use Models\BasketModel;
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

    public function __construct()
    {
//        $db = Database::getConnection();
//        $this->user->setDb($db);
        $this->autentif = new Authentication();
        $this->view = new View();
        $userInf = $this->autentif->getUser();
        $this->person = $this->autentif->isGuest();
        $this->basket = new BasketModel();
        $this->ses = new Session();

        if (!$this->person) {
            $userInf = $this->autentif->getUser();
            $this->userId = $userInf->getId();
            $link = User::getById($this->userId);
            $this->userInfo = User::convert($link);
            $this->count = $this->ses->get('count', 'products') ?? 0;
        }
    }
}

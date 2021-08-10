<?php

namespace Core;

use Db\Database;
use Models\User;

class Controller
{
    public $user;
    public $items;
    public $model;
    public $view;
    public $userInfo;
    public $userId;
    public $person;

    public function __construct()
    {
        $db = Database::getConnection();
        $this->user = new User();
        $this->user->setDb($db);
        $this->autentif = new Authentication();
        $this->view = new View();
        $userInfo = $this->autentif->getUser();
        $this->person = $this->autentif->isGuest();
        if (!$this->person) {
            $userId = $userInfo['id'];
            $this->userInfo = $this->user->findById($userId);
        }
    }
}

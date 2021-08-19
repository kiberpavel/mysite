<?php

namespace Models;

use Core\Model;
use PDO;

class Orders extends Model
{
    public $order;

    public function insertOrder($id_user, $id_item)
    {
        $sth = self::$db->prepare("INSERT INTO  Product_orders (id_user,id_item)"
        . "VALUES (:id_user, :id_item)");
        $sth->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $sth->bindParam(':id_item', $id_item, PDO::PARAM_INT);
        $sth->execute();
        $this->order = $sth;
        return$this->order;
    }
}

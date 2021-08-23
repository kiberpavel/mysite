<?php

namespace Models;

use Core\ActiveRecordEntity;
use Db\Database;
use PDO;

class Orders extends ActiveRecordEntity
{
    protected $idUser;
    protected $idItem;


    public static function insert($id_user, $id_item, $count_items): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'INSERT INTO `' . static::getTableName() . '` (id_user,id_item,count_items)
            VALUES (:id_user, :id_item,:count_items)',
            [':id_user' => $id_user,':id_item' => $id_item,'count' => $count_items],
            User::class
        );
        return $entities ? $entities[0] : null;
    }
//    public function insertOrder($id_user, $id_item)
//    {
//        $sth = self::$db->prepare("INSERT INTO  Product_orders (id_user,id_item)"
//        . "VALUES (:id_user, :id_item)");
//        $sth->bindParam(':id_user', $id_user, PDO::PARAM_INT);
//        $sth->bindParam(':id_item', $id_item, PDO::PARAM_INT);
//        $sth->execute();
//        $this->order = $sth;
//        return $this->order;
//    }
    protected static function getTableName(): string
    {
        return 'Product_orders';
    }
}

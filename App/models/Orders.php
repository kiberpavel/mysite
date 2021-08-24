<?php

namespace Models;

use Core\ActiveRecordEntity;
use Db\Database;
use PDO;

class Orders extends ActiveRecordEntity
{
    public $idUser;
    public $idItem;
    public $countItems;

    public function getIdUser(): int
    {
        return $this->idUser;
    }
    public function getIdItem(): int
    {
        return  $this->idItem;
    }
    public function getCountItems(): int
    {
        return $this->countItems;
    }

    public static function insert($idUser, $idItem, $countItems): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'INSERT INTO `' . static::getTableName() . '` (id_user,id_item,count_items)
            VALUES (:id_user, :id_item,:count_items)',
            [':id_user' => $idUser,':id_item' => $idItem,':count_items' => $countItems],
            User::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function deleteOrder(int $id): array
    {
        $db = Database::getInstance();
        return  $db->query(
            'DELETE FROM `' . static::getTableName() . '`WHERE id = :id',
            [':id' => $id],
            Items::class
        );
    }

    public static function update(int $id, int $idUser, int $idItem, int $countItems): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'UPDATE `' . static::getTableName() . '` SET id_user = :idUser ,
            id_item = :idItem,count_items = :countItems  WHERE id = :id',
            [':idUser' => $idUser,':idItem' => $idItem, ':countItems' => $countItems,':id' => $id],
            User::class
        );
        return $entities ? $entities[0] : null;
    }
    protected static function getTableName(): string
    {
        return 'Product_orders';
    }
}

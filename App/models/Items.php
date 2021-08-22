<?php

namespace Models;

use Core\ActiveRecordEntity;
use Db\Database;
use PDO;

class Items extends ActiveRecordEntity
{
    public $idCategory;
    public $model;
    public $photo;
    public $about;
    public $country;
    public $brend;
    public $price;
    public $countItems;



    public static function selectItems(): array
    {
        $db = Database::getInstance();
        return $db->query(
            'SELECT Items.id,Items.id_category,model,photo,about,country,brend,price,
            Category.name FROM`' . static::getTableName() . '` INNER JOIN `Category` on Items.id_category=Category.id',
            [],
            Items::class
        );
    }

    public static function findByNameItems(string $name): array
    {
        $db = Database::getInstance();
        return  $db->query(
            'SELECT * FROM `' . static::getTableName() . '`INNER JOIN `Category` on Items.id_category=Category.id WHERE Category.name = :name',
            [':name' => $name],
            Items::class
        );
    }

    public static function findByIdItems(int $id): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'SELECT Items.id,Items.id_category,model,photo,about,country,
       brend,price,Category.name FROM `' . static::getTableName() . '`INNER JOIN `Category` on
       Items.id_category=Category.id WHERE Items.id = :id',
            [':id' => $id],
            Items::class
        );
        return $entities ? $entities[0] : null;
    }
    
    public static function deleteProduct(): ?self
    {
        return  0;
    }

//    public function findByCategory(string $name)
//    {
//        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id WHERE Category.name = :name");
//        $sth->bindParam(':name', $name);
//        $sth->execute();
//        $this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
//        return $this->items;
//    }
//    public function getCategories()
//    {
//        $sth = self::$db->prepare("SELECT * FROM  Category ");
//        $sth->execute();
//        $this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
//        return $this->items;
//    }

    protected static function getTableName(): string
    {
        return 'Items';
    }
}

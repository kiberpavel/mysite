<?php

namespace Models;

use Core\ActiveRecordEntity;
use Db\Database;
use PDO;

class Items extends ActiveRecordEntity
{
    public $idCategory;
    public $name;
    public $model;
    public $photo;
    public $about;
    public $country;
    public $brend;
    public $price;
    public $countItems;

    public function getIdCategory(): int
    {
        return $this->idCategory;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getPhoto(): string
    {
        return $this->photo;
    }

    public function getAbout(): string
    {
        return $this->about;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getBrend(): string
    {
        return $this->brend;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getCountItem(): int
    {
        return $this->countItems;
    }

    public function getName(): string
    {
        return $this->name;
    }

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
                   brend,price,count_items,Category.name FROM `' . static::getTableName() . '`INNER JOIN `Category` on
                   Items.id_category=Category.id WHERE Items.id = :id',
            [':id' => $id],
            Items::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function deleteProduct(int $id): array
    {
        $db = Database::getInstance();
        return  $db->query(
            'DELETE FROM `' . static::getTableName() . '`WHERE id = :id',
            [':id' => $id],
            Items::class
        );
    }

    public static function insert(int $idCategory, string $model, string $photo, string $about, string $country, string $brend, int $price, int $count): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'INSERT INTO `' . static::getTableName() . '` (id_category, model,
            photo,about,country,brend,price,count_items)
            VALUES (:id_category, :model, :photo,:about,:country,:brend,:price,:count_items)',
            [':id_category' => $idCategory, ':model' => $model, ':photo' => $photo,':about' => $about,
            ':country' => $country,':brend' => $brend,':price' => $price,':count_items' => $count],
            User::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function update(int $id, int $idCategory, string $model, string $photo, string $about, string $country, string $brend, int $price, int $count): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'UPDATE `' . static::getTableName() . '` SET id_category = :id_category, model = :model,
            photo = :photo ,about = :about ,country = :country,
            brend = :brend,price = :price,count_items = :count_items WHERE id = :id',
            [':id_category' => $idCategory, ':model' => $model, ':photo' => $photo,':about' => $about,
                ':country' => $country,':brend' => $brend,':price' => $price,':count_items' => $count,':id' => $id],
            User::class
        );
        return $entities ? $entities[0] : null;
    }

    protected static function getTableName(): string
    {
        return 'Items';
    }
}

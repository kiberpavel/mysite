<?php

namespace Models;

use Core\Model;
use Db\Database;
use PDO;

class Items extends Model
{
    public $items;

    public $id;
    public $name;
    public $id_category;
    public $model;
    public $photo;
    public $about;
    public $country;
    public $brend;
    public $price;
    public $count_items;


    public function selectAll()
    {
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id");
        $sth->execute();
        $this->items = $sth->fetchAll();
        return $this->items;
    }

    public function findById(int $id)
    {
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id WHERE Items.id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $this->items = $sth->fetch();
        return $this->items;
    }
    public function findByCategory(string $name)
    {
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id WHERE Category.name = :name");
        $sth->bindParam(':name', $name);
        $sth->items = $sth->fetchAll();
        return $this->items;
    }
    public function getCategory()
    {
        $sth = self::$db->prepare("SELECT * FROM  Category ");
        $sth->execute();
        $this->items = $sth->fetchAll();
        return $this->items;
    }
}

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
        $sth = self::$db->prepare("SELECT Items.id,Items.id_category,model,photo,about,country,brend,price,Category.name FROM Items INNER JOIN Category on Items.id_category=Category.id");
        $sth->execute();
        $this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $this->items;
    }

    public function findById($id)
    {
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id WHERE Items.id = :id");
        $sth->bindParam(':id', $id);
        $sth->execute();
        $this->items = $sth->fetch(PDO::FETCH_ASSOC);
        return $this->items;
    }
    public function findByCategory(string $name)
    {
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id_category WHERE Category.name = :name");
        $sth->bindParam(':name', $name);
        $sth->execute();
        $this->items = $sth->fetchAll();
        return $this->items;
    }
    public function getCategories()
    {
        $sth = self::$db->prepare("SELECT * FROM  Category ");
        $sth->execute();
        $this->items = $sth->fetchAll(PDO::FETCH_ASSOC);
        return $this->items;
    }

    public function getProductsByIds($idsArray)
    {
        $products = array();
        $idsString = implode('.', $idsArray);
        $sth = self::$db->prepare("SELECT * FROM Items INNER JOIN Category on Items.id_category=Category.id  WHERE Items.id IN '$idsString' ");
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();

        $i = 0;
        while ($row = $sth->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['photo'] = $row['photo'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }
}

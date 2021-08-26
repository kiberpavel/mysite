<?php

namespace Core;

use Db\Database;
use PDO;

class Model
{
    protected static $db;

    public static function setDb(PDO $db)
    {
        self::$db = $db;
    }

    public static function cutUrl()
    {
        $arrUrl = explode('/', $_SERVER['REQUEST_URI']);
        $end = end($arrUrl);

        return $end;
    }
}

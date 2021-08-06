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
}

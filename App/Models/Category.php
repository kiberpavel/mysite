<?php

namespace Models;

use Core\ActiveRecordEntity;

class Category extends ActiveRecordEntity
{
    protected static function getTableName(): string
    {
        return 'Category';
    }
}

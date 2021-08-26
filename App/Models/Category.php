<?php

namespace Models;

use Core\ActiveRecord\ActiveRecordEntity;

class Category extends ActiveRecordEntity
{
    protected static function getTableName(): string
    {
        return 'category';
    }
}

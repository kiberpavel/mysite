<?php

namespace Core\ActiveRecord;

use Db\Database;

abstract class ActiveRecordEntity
{
    public $id;

    public function getId(): int
    {
        return $this->id;
    }

    public function __set(string $name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }

    public static function convert($object)
    {
        $json = json_encode($object);
        $objectToArray = json_decode($json, true);
        return $objectToArray;
    }


    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    private function camelCaseToUnderscore(string $source): string
    {
        return strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $source));
    }

    public static function getById(int $id): ?self
    {
        $db = Database::getInstance();
        $entities = $db->query(
            'SELECT * FROM `' . static::getTableName() . '` WHERE id=:id;',
            [':id' => $id],
            static::class
        );
        return $entities ? $entities[0] : null;
    }

    public static function selectAll(): array
    {
        $db = Database::getInstance();
        return $db->query('SELECT * FROM `' . static::getTableName() . '`;', [], static::class);
    }
    
    public function delete(): void
    {
        $db = Database::getInstance();
        $db->query(
            'DELETE FROM `' . static::getTableName() . '` WHERE id = :id',
            [':id' => $this->id]
        );
        $this->id = null;
    }

    abstract protected static function getTableName(): string;
}

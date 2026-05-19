<?php

abstract class Model
{
    protected PDO $db;
    protected string $table;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public static function query(): QueryBuilder
    {
        $instance = new static();
        return new QueryBuilder($instance->db, $instance->table);
    }
}

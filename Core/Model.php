<?php

abstract class Model
{
    protected PDO   $db;
    protected string $table;
    protected array  $attributes = [];

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // Access row columns as properties: $category->id, $category->name
    public function __get(string $key): mixed
    {
        return $this->attributes[$key] ?? null;
    }

    // Returns a model instance with attributes loaded, or null if not found
    public static function find(int $id): static|null
    {
        $instance = new static();
        $stmt = $instance->db->prepare(
            "SELECT * FROM {$instance->table} WHERE id = ?"
        );
        $stmt->execute([$id]);
        $row = $stmt->fetch();

        if (!$row) return null;

        $instance->attributes = $row;
        return $instance;
    }

    public static function query(): QueryBuilder
    {
        $instance = new static();
        return new QueryBuilder($instance->db, $instance->table);
    }
}

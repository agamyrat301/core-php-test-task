<?php

class QueryBuilder
{
    private PDO     $db;
    private string  $from;
    private string  $select = '*';
    private array   $conditions = [];
    private array   $bindings   = [];
    private ?int    $limit      = null;
    private ?string $orderBy    = null;

    public function __construct(PDO $db, string $from)
    {
        $this->db   = $db;
        $this->from = $from;
    }

    public function select(string $columns): static
    {
        $this->select = $columns;
        return $this;
    }

    public function where(string $column, mixed $value): static
    {
        $this->conditions[] = "{$column} = ?";
        $this->bindings[]   = $value;
        return $this;
    }

    public function orderBy(string $column, string $direction = 'ASC'): static
    {
        $this->orderBy = "{$column} {$direction}";
        return $this;
    }

    public function take(int $limit): Collection
    {
        $this->limit = $limit;
        return $this->get();
    }

    public function get(): Collection
    {
        $stmt = $this->db->prepare($this->toSql());
        $stmt->execute($this->bindings);
        return new Collection($stmt->fetchAll());
    }

    public function first(): array|false
    {
        $this->limit = 1;
        return $this->get()->first();
    }

    private function toSql(): string
    {
        $sql = "SELECT {$this->select} FROM {$this->from}";

        if ($this->conditions) {
            $sql .= ' WHERE ' . implode(' AND ', $this->conditions);
        }

        if ($this->orderBy) {
            $sql .= " ORDER BY {$this->orderBy}";
        }

        if ($this->limit !== null) {
            $sql .= " LIMIT {$this->limit}";
        }

        return $sql;
    }
}

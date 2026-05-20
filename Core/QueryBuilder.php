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

    public function first(): array|null
    {
        $this->limit = 1;
        return $this->get()->first();
    }

    public function paginate(int $perPage = 10): array
    {
        $page   = max(1, (int) ($_GET['page'] ?? 1));
        $offset = ($page - 1) * $perPage;

        // Count total matching rows without LIMIT
        $countSql = "SELECT COUNT(*) FROM {$this->from}";
        if ($this->conditions) {
            $countSql .= ' WHERE ' . implode(' AND ', $this->conditions);
        }
        $countStmt = $this->db->prepare($countSql);
        $countStmt->execute($this->bindings);
        $total = (int) $countStmt->fetchColumn();

        $lastPage = max(1, (int) ceil($total / $perPage));
        $page     = min($page, $lastPage);

        // Fetch the current page's rows
        $sql  = $this->toSql() . " LIMIT {$perPage} OFFSET {$offset}";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($this->bindings);
        $items = new Collection($stmt->fetchAll());

        return [
            'items'       => $items,
            'total'       => $total,
            'perPage'     => $perPage,
            'currentPage' => $page,
            'lastPage'    => $lastPage,
            'from'        => $total === 0 ? 0 : $offset + 1,
            'to'          => min($offset + $perPage, $total),
        ];
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

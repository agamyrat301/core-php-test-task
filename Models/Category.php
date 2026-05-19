<?php

class Category extends Model
{
    protected string $table = 'categories';

    public function all(): array
    {
        return $this->db
            ->query("SELECT * FROM {$this->table} ORDER BY name")
            ->fetchAll();
    }

    public function find(int $id): array|false
    {
        $stmt = $this->db->prepare(
            "SELECT * FROM {$this->table} WHERE id = :id"
        );
        $stmt->execute([':id' => $id]);

        return $stmt->fetch();
    }

    public function articles(int $categoryId): array
    {
        $stmt = $this->db->prepare("
            SELECT articles.*
            FROM articles
            INNER JOIN article_category ON articles.id = article_category.article_id
            WHERE article_category.category_id = :category_id
            ORDER BY articles.created_at DESC
        ");
        $stmt->execute([':category_id' => $categoryId]);

        return $stmt->fetchAll();
    }
}

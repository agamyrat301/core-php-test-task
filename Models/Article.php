<?php

class Article extends Model
{
    protected string $table = 'articles';

    private string $image;
    private string $title;
    private string $description;
    private string $body;
    private int    $views;

    public function all(): array
    {
        return $this->db
            ->query("SELECT * FROM {$this->table} ORDER BY created_at DESC")
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

    public function categories(int $articleId): array
    {
        $stmt = $this->db->prepare("
            SELECT categories.*
            FROM categories
            INNER JOIN article_category ON categories.id = article_category.category_id
            WHERE article_category.article_id = :article_id
        ");
        $stmt->execute([':article_id' => $articleId]);

        return $stmt->fetchAll();
    }

    public function incrementViews(int $id): void
    {
        $this->db->prepare(
            "UPDATE {$this->table} SET views = views + 1 WHERE id = :id"
        )->execute([':id' => $id]);
    }
}

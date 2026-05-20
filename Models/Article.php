<?php

class Article extends Model
{
    protected string $table = 'articles';

    public static function all(): Collection
    {
        return static::query()->orderBy('created_at', 'DESC')->get();
    }

    public static function categories(int $articleId): QueryBuilder
    {
        $db = Database::getInstance();
        return (new QueryBuilder(
            $db,
            "categories INNER JOIN article_category ON categories.id = article_category.category_id"
        ))
            ->select('categories.*')
            ->where('article_category.article_id', $articleId);
    }

    // Fetch articles from the same categories, excluding the current article
    public static function related(int $articleId, int $limit = 3): Collection
    {
        $db   = Database::getInstance();
        $stmt = $db->prepare("
            SELECT DISTINCT articles.*
            FROM articles
            INNER JOIN article_category ON articles.id = article_category.article_id
            WHERE article_category.category_id IN (
                SELECT category_id FROM article_category WHERE article_id = :id
            )
            AND articles.id != :exclude
            ORDER BY articles.created_at DESC
            LIMIT :limit
        ");
        $stmt->bindValue(':id',      $articleId, PDO::PARAM_INT);
        $stmt->bindValue(':exclude', $articleId, PDO::PARAM_INT);
        $stmt->bindValue(':limit',   $limit,     PDO::PARAM_INT);
        $stmt->execute();

        return new Collection($stmt->fetchAll());
    }

    public function incrementViews(): void
    {
        $this->db->prepare(
            "UPDATE {$this->table} SET views = views + 1 WHERE id = :id"
        )->execute([':id' => $this->id]);
    }
}

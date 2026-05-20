<?php

class Article extends Model
{
    protected string $table = 'articles';

    public function all(): Collection
    {
        return static::query()->orderBy('views')->get();
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

    public function incrementViews(int $id): void
    {
        $this->db->prepare(
            "UPDATE {$this->table} SET views = views + 1 WHERE id = :id"
        )->execute([':id' => $id]);
    }
}

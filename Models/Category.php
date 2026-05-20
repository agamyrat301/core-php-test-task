<?php

class Category extends Model
{
    protected string $table = 'categories';

    public static function all(): QueryBuilder
    {
        return static::query()->orderBy('name');
    }

    // Instance method — works after find(): Category::find($id)->articles()
    public function articles(): QueryBuilder
    {
        return self::articlesQuery()
            ->where('article_category.category_id', $this->id);
    }

    // Static query builder for articles — use when no specific category: Category::articlesQuery()->take(3)
    public static function articlesQuery(): QueryBuilder
    {
        $db = Database::getInstance();
        return (new QueryBuilder(
            $db,
            "articles INNER JOIN article_category ON articles.id = article_category.article_id"
        ))->select('articles.*');
    }
}

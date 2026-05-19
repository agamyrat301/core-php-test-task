<?php

class Category extends Model
{
    protected string $table = 'categories';

    public static function all(): Collection
    {
        return static::query()->orderBy('name')->get();
    }

    public static function find(int $id): array|false
    {
        return static::query()->where('id',$id)->first();
    }

    public static function articles(): QueryBuilder
    {
        $db = Database::getInstance();
        return (new QueryBuilder(
            $db,
            "articles INNER JOIN article_category ON articles.id = article_category.article_id"
        ))->select('articles.*');
    }

}

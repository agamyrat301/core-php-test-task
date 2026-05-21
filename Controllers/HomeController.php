<?php

class HomeController extends Controller
{
    public function index()
    {   
        $categories = new QueryBuilder(
            Database::getInstance(),
            'categories INNER JOIN article_category ON categories.id = article_category.category_id'
        );

        $categories = $categories->select('DISTINCT categories.*')
            ->orderBy('categories.name')
            ->get()
            ->map(function($cat){
                $cat['articles'] = Category::articlesQuery()
                    ->where('article_category.category_id', $cat['id'])
                    ->take(3);
                return $cat;
            });

        $this->view('home/index', ['categories' => $categories]);
    }
}

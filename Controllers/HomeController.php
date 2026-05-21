<?php

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->get()->map(function ($cat) {
            $cat['articles'] = Category::articlesQuery()
                ->where('article_category.category_id', $cat['id'])
                ->orderBy('articles.created_at', 'DESC')
                ->take(3);
            return $cat;
        })->filter(fn($cat) => count($cat['articles']) > 0);
        $this->view('home/index', ['categories' => $categories]);
    }
}

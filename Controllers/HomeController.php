<?php

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->get()->map(function ($cat) {
            $cat['articles'] = Category::articlesQuery()
                ->where('article_category.category_id', $cat['id'])
                ->take(3);
            return $cat;
        });
        $this->view('home/index', ['categories' => $categories]);
    }
}

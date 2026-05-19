<?php

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all()->map(function ($cat) {
            $cat['articles'] = $cat['articles'] = Category::articles()
                ->where('article_category.category_id', $cat['id'])
                ->take(3);
            return $cat;
        });
        $this->view('home/index', ['categories' => $categories]);
    }
}

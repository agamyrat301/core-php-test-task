<?php
class CategoryController extends Controller{
    public function index(){
        $categories = Category::all()->map(function($cat){
            $cat['articles'] = Category::articlesQuery()
                ->where('article_category.category_id', $cat['id'])
                ->take(3);
            return $cat;
        });
        $this->view('categories/index', ['categories' => $categories]);
    }

public function show(int $id)
    {
        $category = Category::find($id)->articles()->paginate();
        var_dump($category); die();
        //$this->view('categories/show', ['categories' => $categories]);

    }
}
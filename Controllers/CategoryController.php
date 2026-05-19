<?php
class CategoryController extends Controller{
    public function index(){
        $categories = Category::all()->map(function($cat){
            $cat['articles'] = $cat->articles()->take(3);
            return $cat;
        });
        $this->view('categories/index', ['categories' => $categories]);
    }
}
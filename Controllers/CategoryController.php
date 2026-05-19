<?php
class CategoryController extends Controller{
    public function index(){
        $category= new Category();
        $categories = $category->all();
        //var_dump($data); die();
        $this->view('categories/index', $categories);
    }
}
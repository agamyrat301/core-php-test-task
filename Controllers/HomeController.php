<?php

class HomeController {
    public function index(){
        $category_by_id = Category::find(5);
        var_dump($category_by_id);die();
    }
}
<?php

class ArticleController extends Controller
{
    public function show(int $id)
    {
        $article = Article::find($id);
        $article->incrementViews();

        $categories = Article::categories($id)->get();
        $related    = Article::related($id);

        $this->view('articles/show', [
            'article'    => $article,
            'categories' => $categories,
            'related'    => $related,
        ]);
    }
}

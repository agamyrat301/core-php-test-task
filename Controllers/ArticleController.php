<?php


class ArticleController extends Controller {
    public function show(int $id)
    {
        $article = Article::find($id);
        $related_articles = $article->categories($id)->paginate();
        var_dump($related_articles); die();
        $this->view('articles/show',['article'=>$article]);

    }
}
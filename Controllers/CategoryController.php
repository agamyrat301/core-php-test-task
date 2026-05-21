<?php
class CategoryController extends Controller{
    public function show(int $id)
    {
        $category = Category::find($id);

        $sortMap = [
            'views' => ['articles.views',       'DESC'],
            'date'  => ['articles.created_at',  'DESC'],
        ];

        $sort   = array_key_exists($_GET['sort'] ?? '', $sortMap) ? $_GET['sort'] : 'date';
        [$col, $dir] = $sortMap[$sort];

        $pagination = $category->articles()
            ->orderBy($col, $dir)
            ->paginate(9);

        $this->view('categories/show', [
            'category'    => $category,
            'pagination'  => $pagination,
            'currentSort' => $sort,
        ]);
    }
}
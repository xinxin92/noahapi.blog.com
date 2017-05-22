<?php
//文章-新增
namespace App\Http\Controllers\Article;

class ArticleAdd extends ArticleBase
{
    public function index()
    {
        $data = [];
        return view('article.add', $data);
    }

}

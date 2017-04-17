<?php
//数据库连接测试
namespace App\Http\Controllers\Test;

use App\Models\Article;

class TestDatabase extends TestBase
{
    public function index()
    {
        $ArticleMod = new Article();
        $list = $ArticleMod->select('*')->get()->toArray();
        return $list;
    }
}

<?php
//数据库连接测试
namespace App\Http\Controllers\Test;

use Illuminate\Support\Facades\DB;

class Database extends Base
{
    public function index()
    {
        $list = DB::table('test')->select('id','name')->get();
        return $list;
    }
}

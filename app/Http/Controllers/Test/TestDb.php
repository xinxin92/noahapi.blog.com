<?php

namespace App\Http\Controllers\Test;

use Illuminate\Support\Facades\DB;

class TestDb extends TestBase{
    public function index()
    {
        $list = DB::table('test')->select('id','name')->get();
        return $list;
    }
}

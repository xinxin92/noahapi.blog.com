<?php

Route::get('/', function () {
    return view('welcome');
});

//测试
Route::group([
    'prefix' => 'test',
    'namespace' => 'Test',
//    'middleware' => ['checkLogin', 'recordLog'],
], function () {
    Route::match(['get', 'post'],'/database/index', 'TestDatabase@index');
    Route::match(['get', 'post'],'/alipay/pay', 'TestAlipay@pay');
    Route::match(['get', 'post'],'/alipay/query', 'TestAlipay@query');
    Route::match(['get', 'post'],'/excel/export', 'TestExcel@export');
    Route::match(['get', 'post'],'/excel/import', 'TestExcel@import');
//    Route::post('/db', 'TestDb@index');
//    Route::match(['get','post'],'/db', 'TestDb@index');
});

//基础模块
Route::group([
    'prefix' => 'home',
    'namespace' => 'Home',
], function () {
    //菜单
    Route::match(['get', 'post'],'/menu', 'HomeMenu@index');
    //登录用户的信息
    Route::match(['get', 'post'],'/master', 'HomeMaster@index');
});

//内容模块
Route::group([
    'prefix' => 'content',
    'namespace' => 'Content',
], function () {
    //内容列表
    Route::match(['get', 'post'],'/list', 'ContentList@index');
});


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

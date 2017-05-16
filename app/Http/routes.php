<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
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

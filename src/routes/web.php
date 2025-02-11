<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// routes/web.phpは、ルート定義用のファイル。

// ルート定義とは？
// URIとHTTPメソッドの組み合わせで実行する処理を指定すること。

Route::get('/', function () {
    return view('welcome');
});

// 一覧画面
Route::get('/todo', 'TodoController@index');

// 新規作成画面
Route::get('/todo/create', 'TodoController@create');
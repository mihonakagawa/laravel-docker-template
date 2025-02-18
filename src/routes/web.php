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

// Laravelは、Serverで動く言語。
// ユーザーがクライアントから送信したリクエストを、Webサーバーが受け取り、
// Webサーバーが送信したリクエストをアプリケーションサーバーが受け取り、
// アプリケーションサーバーから送信したリクエストをDBサーバーが受け取る
// Laravelは、アプリケーションサーバーで動いている。

Route::get('/', function () {
    return view('welcome');
});

// 一覧画面の表示のルート
Route::get('/todo', 'TodoController@index')->name('todo.index');

// Restful： リソースに対して何をするかによってURL名とHTTPリクエストの組み合わせで表す概念
// Controller：リクエストとレスポンスを扱う
// UI→サーバーへリクエスト→(Routeで振り分け)→受け取り先
// Modelとのやりとりはどこで？
// MVCS S:サービス
// MVCSR　R：リポジトリ


// 新規作成画面の表示のルート
Route::get('/todo/create', 'TodoController@create')->name('todo.create');
// 名前付きルート: ->name('ルート名')
// route('ルート名')とすることで、ルート名からそのルートで設定したURLを生成できる。
// bladeファイルのhtml内で、href="{{ route('todo.create') }}などと指定できる。

// 新規作成処理のルート
Route::post('/todo', 'TodoController@store')->name('todo.store');

// 詳細画面の表示のルート
Route::get('/todo/{id}', 'TodoController@show')->name('todo.show');
// {id}の部分は、変数を読み込んでいる。
// /todo/1や/todo/2の「1」や「2」のような変数の部分をルートパラメータという
// bladeファイルからRoute関数の第二引数で渡されたルートパラメータを{id}などど読み込むことで、
// Controllerの関数にルートパラメータを渡すことができる。

// 更新用の画面のルート
Route::get('/todo/{id}/edit', 'TodoController@edit')->name('todo.edit');
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    public function index()
    {
        // TodoModelをインスタンス化
        $todo = new Todo();
        // todosテーブルのレコードを全件取得
        $todos = $todo->all();
        // dd($todos);
        // allメソッドの返り値：Illuminate\Database\Eloquent\Collectionクラスのインスタンス
        // CollectionインスタンスはLaravelで用意されているクラスで配列操作に特化したクラス
        
        // view関数で、画面表示したいHTMLを指定
        return view('todo.index');
        // view関数の引数：表示させたいBladeファイル
        // 「resources/views/から対象の*.blade.phpまでの相対パスを.区切りで指定」します。
    }
}

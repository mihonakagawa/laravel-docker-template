<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    // 一覧表示の表示
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

        return view('todo.index', ['todos' => $todos]);
        // view関数の第一引数：表示させたいBladeファイル
        // view関数の第二引数：Bladeファイルに渡したいデータの連想配列（[blade内での変数名 => 代入したい値]）
        // 「resources/views/から対象の*.blade.phpまでの相対パスを.区切りで指定」します。
    }

    // 新規作成画面の表示
    public function create()
    {
        return view('todo.create');
    }

    // 新規作成の処理
    public function store(Request $request)
    {
        // フォームから送信されたデータを取得
        $content = $request->input('content');
        // Illuminate\Http\Requestインスタンス->input(入力欄のname属性)
        // メソッドインジェクション：メソッドの引数の左側にクラス名を書くことで、インスタンスが引数に代入される。

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        $todo = new Todo();
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        $todo->content = $content;
        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $todo->save();

        // 一覧画面へリダイレクト
        return redirect()->route('todo.index');
    }
}

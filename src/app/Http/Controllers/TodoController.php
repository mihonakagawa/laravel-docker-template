<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
    private $todo;

    public function __construct(Todo $todo)
    {
        // コンストラクタインジェクション：Todoクラスのインスタンスを生成し、$todoという変数に代入。
        $this->todo = $todo;
    }

    // 一覧画面の表示
    public function index()
    {
        // TodoModelをインスタンス化
        $todo = new Todo();
        // todosテーブルのレコードを全件取得
        $todos = $todo->all();
        // dd($todos);
        // dd($todo); // 
        // allメソッドの返り値：Illuminate\Database\Eloquent\Collectionクラスのインスタンス
        // CollectionインスタンスはLaravelで用意されているクラスで配列操作に特化したクラス
        // allメソッドなんで定義されてない呼べている？
        
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
        // フォームから送信されたデータを個別で取得
        // $content = $request->input('content');
        // Illuminate\Http\Requestインスタンス->input(入力欄のname属性)
        // メソッドインジェクション：メソッドの引数の左側にクラス名を書くことで、インスタンスが引数に代入される。

        // フォームから送信されたデータを一括で取得
        $inputs = $request->all();

        // 1. todosテーブルの1レコードを表すTodoクラスをインスタンス化
        // $todo = new Todo();
        
        // 2. Todoインスタンスのカラム名のプロパティに保存したい値を代入
        // $todo->content = $inputs['content']; // 個別で代入する
        // $todo->fill($inputs); // 一括で代入する
        $this->todo->fill($inputs);
        // dd($todo);

        // 3. Todoインスタンスの`->save()`を実行してオブジェクトの状態をDBに保存するINSERT文を実行
        $this->todo->save();

        // 一覧画面を表示
        return redirect()->route('todo.index');
        // redirect() でリダイレクトインスタンス作成
        // route()メソッドでサーバーへリクエスト
        // つまり、web.phpに遷移
    }

    // 詳細画面の表示
    public function show($id)
    {
        // find()メソッド：指定のIDのデータを取得
        // $model = new Todo();
        // $todo = $model->find($id);
        $todo = $this->todo->find($id);

        // 詳細画面を表示
        return view('todo.show', ['todo' => $todo]);
    }

    // 編集画面の表示
    public function edit($routeParam)
    {
        // 編集対象のレコードの情報を持つTodoモデルのインスタンスを取得
        $todo = $this->todo->find($routeParam);
        // dd($todo);
        return view('todo.edit', ['todo' => $todo]);
    }
}

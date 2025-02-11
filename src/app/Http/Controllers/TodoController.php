<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        // dd('Hello World!');
        return view('todo.index');
        // view関数を用いることで、画面として表示したいHTMLを指定することができます。
        // view関数の引数には、表示させたいBladeファイルを指定する必要があり、
        // 「resources/views/から対象の*.blade.phpまでの相対パスを.区切りで指定」します。
    }
}

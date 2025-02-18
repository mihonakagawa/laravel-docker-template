<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// Model：データベースのテーブルとマッピングするClassのこと。
use Illuminate\Database\Eloquent\SoftDeletes;

class Todo extends Model
{
    // SoftDeletesトレイト: Modelクラスに追加することで削除処理を論理削除に変更するためのトレイト
    use SoftDeletes;

    // このModelを、データベースのtodosテーブルとマッピング
    protected $table = 'todos';

    // ->fill()によってModelに代入可能なプロパティを記述
    // 意図しないカラムを更新されるのを防ぐ目的
    protected $fillable = [
        'content',
    ];
}

// トレイトとは、クラスにプロパティやメソッドを追加するための機能
    // クラスの継承とは異なり1つのクラスに複数のトレイトを追加することができる
    // トレイト自体はインスタンス化できない
    // トレイトはtrait {トレイト名}で定義し、クラスにuse {トレイト名}とすることで使用

    // trait GreetingTrait {
    //     public function greet() {
    //         echo "Hello! ";
    //     }
    // }

    // trait FarewellTrait {
    //     public function farewell() {
    //         echo "Goodbye!";
    //     }
    // }

    // // トレイトをクラスに適用
    // class Human {
    //     use GreetingTrait,
    //         FarewellTrait;
    // }
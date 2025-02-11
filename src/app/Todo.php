<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model：データベースのテーブルとマッピングするClassのこと。

class Todo extends Model
{
    // このModelを、データベースのtodosテーブルとマッピング
    protected $table = 'todos';

    // ->fill()によってModelに代入可能なプロパティを記述
    // 意図しないカラムを更新されるのを防ぐ目的
    protected $fillable = [
        'content',
    ];
}

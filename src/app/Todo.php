<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

// Model：データベースのテーブルとマッピングするClassのこと。

class Todo extends Model
{
    // このModelを、データベースのtodosテーブルとマッピング
    protected $table = 'todos';
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * マイグレーションファイルにはupメソッドの他にdownメソッドが用意されています。
     * up : データベースに新しいテーブル、カラム、またはインデックスを追加するために使用します。
     * down : upメソッドによって実行する操作と逆の操作を実装し、以前の状態へ戻す必要があります。
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('content'); // todosテーブルのcontentカラムを追加
            // 作成されたマイグレーションファイルには、テーブルを作成するための雛形が出来上がっている。
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('todos');
    }
}

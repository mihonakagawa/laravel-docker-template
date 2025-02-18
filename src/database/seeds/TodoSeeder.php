<?php

use Illuminate\Database\Seeder;

class TodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 元々テーブルに存在していたデータを削除後、テストデータを投入
        DB::table('todos')->truncate();
        // truncateメソッドは該当のテーブルのレコードをすべて削除するTRUNCATE文を実行する

        // テストデータ
        $testData = [
            [
                'content' => 'PHP Appセクションを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'content' => 'Laravel Lessonを終える',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // 用意したテストデータをtodosテーブルに投入する処理
        DB::table('todos')->insert($testData);
        // DB::table('todos')はtableメソッドの引数のテーブルを操作するための準備。
        // insertメソッドは引数のデータをテーブルに投入するINSERT文を実行する。
    }

    // /**
    //  * Run the database seeds.
    //  *
    //  * @return void
    //  */
    // public function call($array)
    // {
        
    // }
}

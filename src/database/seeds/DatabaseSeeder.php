<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // 作成したシーダークラスはこのままでは実行できません。
        // database/seeds/DatabaseSeeder.phpのcallメソッドに登録することで実行することができます。
        $this->call([
            TodoSeeder::class,
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}

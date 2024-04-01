<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'メンズ',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'レディース',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'ユニセックス',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'ベビー・キッズ',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'トップス',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'ボトムス',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => '靴',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'バッグ',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'アクセサリ',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);

        $param = [
            'name' => 'その他',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('categories')->insert($param);
    }
}

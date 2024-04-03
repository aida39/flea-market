<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'item_id' => '1',
            'comment' => 'サイズを教えてください',
            'created_at' => '2024-04-01 11:00:00',

        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => '2',
            'item_id' => '1',
            'comment' => 'コメントありがとうございます。こちらはMサイズです。',
            'created_at' => '2024-04-01 11:00:00',

        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => '3',
            'item_id' => '1',
            'comment' => '値引きは可能でしょうか？',
            'created_at' => '2024-04-01 11:00:00',

        ];
        DB::table('comments')->insert($param);

        $param = [
            'user_id' => '1',
            'item_id' => '2',
            'comment' => 'コメント本文です。コメント本文です。コメント本文です。コメント本文です。',
            'created_at' => '2024-04-01 11:00:00',

        ];
        DB::table('comments')->insert($param);
    }
}

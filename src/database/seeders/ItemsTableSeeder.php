<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
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
            'condition_id' => '1',
            'name' => 'NEW YORK Tシャツ',
            'brand' => 'グローバルクロージング',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_01.jpg',
            'price' => '3000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'condition_id' => '2',
            'name' => 'カーディガン',
            'brand' => 'アーバンスタイル',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_02.jpg',
            'price' => '5000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'condition_id' => '3',
            'name' => 'カットソー 赤',
            'brand' => 'モダンウェア',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_03.jpg',
            'price' => '7000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '4',
            'condition_id' => '4',
            'name' => 'ダウンジャケット 黒',
            'brand' => 'アーバンスタイル',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_04.jpg',
            'price' => '10000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '5',
            'condition_id' => '1',
            'name' => 'ダウンジャケット 白',
            'brand' => 'アーバンスタイル',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_05.jpg',
            'price' => '20000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'condition_id' => '2',
            'name' => 'ルームウェア上下セット',
            'brand' => 'モダンウェア',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_06.jpg',
            'price' => '15000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'condition_id' => '3',
            'name' => 'パンプス 白',
            'brand' => 'モダンウェア',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_07.jpg',
            'price' => '4000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'condition_id' => '3',
            'name' => 'レザーバッグ',
            'brand' => 'グローバルクロージング',
            'description' => '購入後、即発送します',
            'image_path' => '/images/item_08.jpg',
            'price' => '6000',
            'recommend_flag' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('items')->insert($param);
    }
}

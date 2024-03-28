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
            'name' => '商品01',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '良好',
            'price' => '3000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'name' => '商品02',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '新古品',
            'price' => '5000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'name' => '商品03',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '良好',
            'price' => '7000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '4',
            'name' => '商品04',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '良好',
            'price' => '10000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '5',
            'name' => '商品05',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '新品',
            'price' => '20000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '1',
            'name' => '商品06',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '新古品',
            'price' => '15000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '2',
            'name' => '商品07',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '新品',
            'price' => '4000',
        ];
        DB::table('items')->insert($param);
        $param = [
            'user_id' => '3',
            'name' => '商品08',
            'description' => '商品の状態は良好です。傷もありません。購入後、即発送します',
            'image_path' => 'dummy_path',
            'status' => '新品',
            'price' => '6000',
        ];
        DB::table('items')->insert($param);
    }
}

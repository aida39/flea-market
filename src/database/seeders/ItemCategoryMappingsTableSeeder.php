<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategoryMappingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'item_id' => '1',
            'category_id' => '3',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '1',
            'category_id' => '5',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '2',
            'category_id' => '2',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '2',
            'category_id' => '5',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '3',
            'category_id' => '2',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '3',
            'category_id' => '5',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '4',
            'category_id' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '4',
            'category_id' => '5',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '5',
            'category_id' => '2',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '5',
            'category_id' => '5',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '6',
            'category_id' => '3',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '6',
            'category_id' => '10',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '7',
            'category_id' => '2',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '7',
            'category_id' => '7',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '8',
            'category_id' => '2',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);

        $param = [
            'item_id' => '8',
            'category_id' => '8',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('item_category_mappings')->insert($param);
    }
}

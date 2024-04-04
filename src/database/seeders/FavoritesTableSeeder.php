<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
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
            'item_id' => '4',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '1',
            'item_id' => '6',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '2',
            'item_id' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '3',
            'item_id' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('favorites')->insert($param);
    }
}

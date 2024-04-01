<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '新品',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '新古品',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '良品',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '使用感あり',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('conditions')->insert($param);

        $param = [
            'name' => '傷あり',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('conditions')->insert($param);
    }
}

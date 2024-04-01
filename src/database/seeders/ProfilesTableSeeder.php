<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfilesTableSeeder extends Seeder
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
            'name' => '鈴木たろう',
            'postal_code' => '1000001',
            'address' => '東京都千代田区1-1',
            'image_path' => '/images/profile.jpg',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('profiles')->insert($param);
    }
}

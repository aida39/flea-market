<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'email' => 'admin@example.com',
            'password' => Hash::make('coachtech'),
            'created_at' => '2024-04-16 00:00:00',
        ];
        DB::table('admins')->insert($param);
    }
}

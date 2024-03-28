<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'email' => 'user01@example.com',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'email' => 'user02@example.com',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'email' => 'user03@example.com',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'email' => 'user04@example.com',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
        $param = [
            'email' => 'user05@example.com',
            'password' => Hash::make('coachtech'),
        ];
        DB::table('users')->insert($param);
    }
}

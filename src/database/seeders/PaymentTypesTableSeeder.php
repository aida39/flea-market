<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => 'クレジットカード',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('payment_types')->insert($param);

        $param = [
            'name' => 'コンビニ',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('payment_types')->insert($param);

        $param = [
            'name' => '銀行振込',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('payment_types')->insert($param);
    }
}

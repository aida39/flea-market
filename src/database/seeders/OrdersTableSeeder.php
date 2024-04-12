<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
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
            'payment_type_id' => '1',
            'shipping_address_id' => '1',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('orders')->insert($param);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'postal_code' => '1000001',
            'address' => '東京都港区南青山1-1',
            'building' => '青山ツインタワー',
            'created_at' => '2024-04-01 11:00:00',
        ];
        DB::table('shipping_addresses')->insert($param);
    }
}

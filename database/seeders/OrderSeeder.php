<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $orders = [];
        // create a few orders for customers 1..5 — match migration columns
        for ($i = 1; $i <= 5; $i++) {
            $orders[] = [
                'user_id' => null,
                'order_number' => 1000 + $i,
                'total_amount' => 20 * $i,
                'discount' => 0,
                'shipping_cost' => 0,
                'payment_status' => 'pending',
                'order_status' => 'processing',
                'shipping_address_id' => 1,
                'payment_method' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('orders')->insert($orders);
    }
}

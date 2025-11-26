<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderItemSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $items = [];
        // For orders 1..5 add 2 items each — match migration columns (no order_id column)
        for ($order = 1; $order <= 5; $order++) {
            $p1 = ($order * 2) - 1;
            $p2 = $p1 + 1;
            $price1 = 10 * $p1;
            $price2 = 10 * $p2;
            $items[] = [
                'product_id' => $p1,
                'variant_id' => 0,
                'quantity' => 1,
                'price' => $price1,
                'subtotal' => $price1 * 1,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $items[] = [
                'product_id' => $p2,
                'variant_id' => 0,
                'quantity' => 2,
                'price' => $price2,
                'subtotal' => $price2 * 2,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('order_items')->insert($items);
    }
}

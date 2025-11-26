<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartItemSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $items = [];

        // Add items to the three carts we seeded earlier
        $items[] = [
            'cart_id' => 1,
            'product_id' => 1,
            'variant_id' => null,
            'quantity' => 2,
            'price' => 25.00,
            'subtotal' => 50.00,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $items[] = [
            'cart_id' => 1,
            'product_id' => 2,
            'variant_id' => null,
            'quantity' => 1,
            'price' => 50.00,
            'subtotal' => 50.00,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $items[] = [
            'cart_id' => 2,
            'product_id' => 3,
            'variant_id' => null,
            'quantity' => 1,
            'price' => 45.50,
            'subtotal' => 45.50,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        $items[] = [
            'cart_id' => 3,
            'product_id' => 4,
            'variant_id' => null,
            'quantity' => 1,
            'price' => 30.00,
            'subtotal' => 30.00,
            'created_at' => $now,
            'updated_at' => $now,
        ];

        DB::table('cart_items')->insert($items);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductVariantSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $variants = [];
        // A couple variants for first 10 products — match migration columns
        for ($i = 1; $i <= 10; $i++) {
            $variants[] = [
                'product_id' => $i,
                'attribute' => 'Size',
                'value' => 'Default',
                'price_adjustment' => 0,
                'stock' => 10,
                'created_at' => $now,
                'updated_at' => $now,
            ];
            $variants[] = [
                'product_id' => $i,
                'attribute' => 'Size',
                'value' => 'Large',
                'price_adjustment' => 2,
                'stock' => 8,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('product_variants')->insert($variants);
    }
}

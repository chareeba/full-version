<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImageSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $images = [];
        // Add one image per product id 1..20
        for ($i = 1; $i <= 20; $i++) {
            $images[] = [
                'product_id' => $i,
                'image_path' => 'assets/img/product-' . $i . '.jpg',
                'alt_text' => 'Product ' . $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('product_images')->insert($images);
    }
}

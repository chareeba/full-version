<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = now();

        $products = [];
        for ($i = 1; $i <= 20; $i++) {
            $name = "Sample Product {$i}";
            $products[] = [
                'category_id' => (($i - 1) % 5) + 1,
                'sub_category_id' => (($i - 1) % 8) + 1,
                'name' => $name,
                'slug' => Str::slug($name) . "-{$i}",
                'sku' => 'SKU' . str_pad($i, 4, '0', STR_PAD_LEFT),
                'price' => 10 + $i * 2,
                'discount_price' => 0,
                'stock' => 10 + $i,
                'short_description' => 'Short description for ' . $name,
                'long_description' => 'Long description for ' . $name,
                'status' => 1,
                'featured' => ($i % 5 === 0) ? 1 : 0,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('products')->insert($products);
    }
}

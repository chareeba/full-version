<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $categories = [
            ['name' => 'Electronics', 'slug' => 'electronics', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Clothing', 'slug' => 'clothing', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Home & Garden', 'slug' => 'home-garden', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Sports', 'slug' => 'sports', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Books', 'slug' => 'books', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('categories')->insert($categories);
    }
}

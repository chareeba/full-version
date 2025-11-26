<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategorySeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $sub = [
            ['category_id' => 1, 'name' => 'Phones', 'slug' => 'phones', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 1, 'name' => 'Computers', 'slug' => 'computers', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 2, 'name' => 'Men', 'slug' => 'men', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 2, 'name' => 'Women', 'slug' => 'women', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 3, 'name' => 'Furniture', 'slug' => 'furniture', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 4, 'name' => 'Fitness', 'slug' => 'fitness', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 5, 'name' => 'Fiction', 'slug' => 'fiction', 'created_at' => $now, 'updated_at' => $now],
            ['category_id' => 5, 'name' => 'Non-Fiction', 'slug' => 'non-fiction', 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('sub_categories')->insert($sub);
    }
}

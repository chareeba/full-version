<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WishlistSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $wishlists = [];
        for ($i = 1; $i <= 10; $i++) {
            $wishlists[] = [
                'user_id' => ($i % 3) + 1, // rotate users 1-3
                'product_id' => $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('wishlists')->insert($wishlists);
    }
}

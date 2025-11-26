<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $reviews = [];
        for ($i = 1; $i <= 8; $i++) {
            $reviews[] = [
                'product_id' => (($i - 1) % 20) + 1,
                'user_id' => (($i - 1) % 3) + 1,
                'rating' => rand(3, 5),
                'comment' => 'Sample review ' . $i,
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('reviews')->insert($reviews);
    }
}

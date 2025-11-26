<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        DB::table('coupons')->insert([
            [
                'code' => 'WELCOME10',
                'discount_type' => 'percentage',
                'discount_value' => 10,
                'start_date' => $now->toDateString(),
                'end_date' => $now->addDays(30)->toDateString(),
                'min_order_amount' => 0,
                'max_uses' => 0,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'code' => 'FLAT5',
                'discount_type' => 'fixed',
                'discount_value' => 5,
                'start_date' => $now->toDateString(),
                'end_date' => $now->addDays(30)->toDateString(),
                'min_order_amount' => 0,
                'max_uses' => 0,
                'status' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}

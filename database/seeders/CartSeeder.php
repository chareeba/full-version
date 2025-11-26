<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $carts = [
            [
                'user_id' => 1,
                'session_id' => null,
                'total' => 100.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'session_id' => null,
                'total' => 45.50,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => null,
                'session_id' => 'guest-session-abc123',
                'total' => 30.00,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('carts')->insert($carts);
    }
}

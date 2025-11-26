<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaymentSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        // payment_method: 1=stripe, 2=paypal, 3=cod
        // status: 1=success, 0=failure
        $payments = [];
        for ($i = 1; $i <= 10; $i++) {
            $payments[] = [
                'order_id' => $i,
                'payment_method' => ($i % 3) + 1,
                'trasaction_id' => $i, // just use $i for unique int
                'amount' => 100 + $i * 10,
                'status' => ($i % 2),
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }
        DB::table('payments')->insert($payments);
    }
}

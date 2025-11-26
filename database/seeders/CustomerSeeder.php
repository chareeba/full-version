<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $customers = [];
        $professions = ['Developer', 'Designer', 'Manager', 'Consultant', 'Engineer'];
        for ($i = 1; $i <= 8; $i++) {
            $customers[] = [
                'name' => 'Customer ' . $i,
                'email' => "customer{$i}@example.com",
                'phone' => '555-010' . $i,
                'gender' => ($i % 2 === 0) ? 'female' : 'male',
                'profession' => $professions[($i - 1) % count($professions)],
                'created_at' => $now,
                'updated_at' => $now,
            ];
        }

        DB::table('customers')->insert($customers);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShippingAddressSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $addresses = [
            [
                'user_id' => 1,
                'full_name' => 'Alice Example',
                'phone' => '555-0101',
                'email' => 'alice@example.test',
                'address' => '123 Main St',
                'city' => 'Metropolis',
                'state' => 'State',
                'postal_code' => '10001',
                'country' => 'Country',
                'is_default' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 2,
                'full_name' => 'Bob Example',
                'phone' => '555-0202',
                'email' => 'bob@example.test',
                'address' => '456 Side St',
                'city' => 'Gotham',
                'state' => 'State',
                'postal_code' => '20002',
                'country' => 'Country',
                'is_default' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 3,
                'full_name' => 'Carol Example',
                'phone' => '555-0303',
                'email' => 'carol@example.test',
                'address' => '789 Another Rd',
                'city' => 'Star City',
                'state' => 'State',
                'postal_code' => '30003',
                'country' => 'Country',
                'is_default' => 0,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ];

        DB::table('shipping_addresses')->insert($addresses);
    }
}

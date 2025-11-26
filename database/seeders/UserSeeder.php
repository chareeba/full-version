<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        $users = [
            ['name' => 'Admin User', 'email' => 'admin@example.com', 'password' => Hash::make('password'), 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Editor User', 'email' => 'editor@example.com', 'password' => Hash::make('password'), 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Staff User', 'email' => 'staff@example.com', 'password' => Hash::make('password'), 'created_at' => $now, 'updated_at' => $now],
        ];

        DB::table('users')->insert($users);
    }
}

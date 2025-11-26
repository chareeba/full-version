<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    public function run()
    {
        $now = now();
        DB::table('settings')->insert([
            ['key' => 'site_name', 'value' => 'Hexadash Demo', 'created_at' => $now, 'updated_at' => $now],
            ['key' => 'support_email', 'value' => 'support@example.com', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}

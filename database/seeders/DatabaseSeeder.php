<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Company;
use App\Models\Coupon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        Coupon::factory(10)->create();
        \App\Models\User::factory()->create([
            'email' => 'admin@admin.com',
            'password' => 'password',
            'state_id' => 3,
        ]);
    }
}

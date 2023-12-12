<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'depan',
            'last_name' => 'belakang',
            'email' => 'admin@gmail.com',
            'password' => env('ADMIN_PASSWORD'),
            'role' => 'admin',
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'username' => 'faizanahmedraza',
            'name' => 'Faizan Ahmed Raza',
            'email' => 'faizan@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$sYgA9faH6Li0ZZfGtIMcY.vGk3vSwHFP981wDoGKuY.qKM8cI7w8S', // admin123
            'remember_token' => Str::random(10),
        ]);
    }
}

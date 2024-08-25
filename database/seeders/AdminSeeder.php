<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            "username" => 'testuser',
            'password' => "password",
            'role' => 1,
            'email' => 'test@example.com',
        ]);
        User::factory()->create([
            'name' => 'Test Admin',
            "username" => 'testadmin',
            'password' => "password",
            'role' => 0,
            'email' => 'mehmet@deniz.com',
        ]);
    }
}

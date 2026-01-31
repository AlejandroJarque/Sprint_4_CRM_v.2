<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'demo@example.com'],
            [
                'name' => 'Demo User',
                'password' => Hash::make('Password123!'),
            ]
        );

        User::firstOrCreate(
            ['email' => 'second@example.com'],
            [
                'name' => 'Second User',
                'password' => Hash::make('Password123!'),
            ]
        );
    }
}

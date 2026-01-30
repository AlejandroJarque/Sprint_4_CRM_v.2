<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        $demoUser = User::where('email', 'demo@example.com')->first();
        $secondUser = User::where('email', 'second@example.com')->first();

        Client::create([
            'name' => 'Acme Corp',
            'email' => 'contact@acme.com',
            'phone' => '+34 600 111 222',
            'address' => 'Calle Mayor 1, Madrid',
            'user_id' => $demoUser->id,
        ]);

        Client::create([
            'name' => 'Globex Corporation',
            'email' => 'info@globex.com',
            'phone' => '+34 600 333 444',
            'address' => 'Avenida Diagonal 100, Barcelona',
            'user_id' => $demoUser->id,
        ]);

        Client::create([
            'name' => 'Initech',
            'email' => 'hello@initech.com',
            'phone' => '+34 600 555 666',
            'address' => 'Gran Vía 50, Madrid',
            'user_id' => $secondUser->id,
        ]);
    }

}

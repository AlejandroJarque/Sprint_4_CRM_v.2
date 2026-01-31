<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ActivitySeeder extends Seeder
{
    public function run(): void
    {
        $demoUser = User::where('email', 'demo@example.com')->first();
        $secondUser = User::where('email', 'second@example.com')->first();

        $demoClient = Client::where('user_id', $demoUser->id)->first();
        $secondClient = Client::where('user_id', $secondUser->id)->first();

        Activity::firstOrCreate(
            [
                'user_id' => $demoUser->id,
                'client_id' => $demoClient->id,
                'type' => 'call',
                'activity_date' => Carbon::now()->addDays(2),
            ],
            [
                'status' => 'pending',
                'description' => 'Initial contact call with the client.',
            ]
        );

        Activity::firstOrCreate(
            [
                'user_id' => $demoUser->id,
                'client_id' => $demoClient->id,
                'type' => 'meeting',
                'activity_date' => Carbon::now()->addDays(5),
            ],
            [
                'status' => 'completed',
                'description' => 'Project planning meeting.',
            ]
        );

        Activity::firstOrCreate(
            [
                'user_id' => $secondUser->id,
                'client_id' => $secondClient->id,
                'type' => 'email',
                'activity_date' => Carbon::now()->addDays(3),
            ],
            [
                'status' => 'pending',
                'description' => 'Send proposal by email.',
            ]
        );
    }
}


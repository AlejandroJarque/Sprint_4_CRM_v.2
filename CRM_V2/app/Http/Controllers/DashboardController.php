<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function indexAction()
    {
        $userId = Auth::id();

        $clientsCount = Client::where('user_id', $userId)->count();
        $activitiesCount = Activity::where('user_id', $userId)->count();

        return view('dashboard', [
            'clientsCount' => $clientsCount,
            'activitiesCount' => $activitiesCount,
        ]);
    }
}
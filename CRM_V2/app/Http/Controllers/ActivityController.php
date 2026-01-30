<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateActivityRequest;
use App\Models\Client;
use App\Services\ActivityService;

class ActivityController extends Controller
{

    public function indexAction()
    {
        $activities = Activity::where('user_id', Auth::id())->get();

        return view('activities.index', [
            'activities' => $activities
        ]);
    }

    public function createAction()
    {
        $clients = Client::orderBy('name')->get();
        return view('activities.create', ['clients' => $clients]);
    }

    public function storeAction(StoreUpdateActivityRequest $request, ActivityService $activityService)
    {
        $activityService->create($request->validated());

        return redirect()->route('activities.index')
                         ->with('success', 'Activity registered successfully.');
    }

    public function showAction($id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

        return view('activities.show', [
            'activity' => $activity
        ]);
    }
    
    public function editAction($id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

        $clients = Client::orderBy('name')->get();

        return view('activities.edit', [
            'activity' => $activity,
            'clients' => $clients,
        ]);
    }

    public function updateAction(StoreUpdateActivityRequest $request, $id, ActivityService $activityService)
    {

        $activity = $activityService->update($id, $request->validated());

        return redirect()->route('activities.show', $activity->id)
                         ->with('success', 'Activity updated successfully');
    }

    public function deleteAction($id, ActivityService $activityService)
    {

        $activityService->delete($id);

        return redirect()->route('activities.index')
                         ->with('success', 'Activity deleted successfully');
    }
}
?>
<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUpdateActivityRequest;
use App\Models\Client;

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

    public function storeAction(StoreUpdateActivityRequest $request)
    {
        Activity::create(array_merge(
            $request->validated(),
            ['user_id' => Auth::id()]
            )
        );

        return redirect()->route('activities.index')
                         ->with('success', 'Activity registered successfully.');
    }

    public function showAction($id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

        if(!$activity) {
            return redirect()->route('activities.index')
                             -> with('error', 'Activity not found.');
        }

        return view('activities.show', [
            'activity' => $activity
        ]);
    }
    
    public function editAction($id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

        if(!$activity) {
            return redirect()->route('activities.index')
                             ->with('error', 'Activity not found.');
        }

        $clients = Client::orderBy('name')->get();

        return view('activities.edit', [
            'activity' => $activity,
            'clients' => $clients,
        ]);
    }

    public function updateAction(StoreUpdateActivityRequest $request, $id)
    {
        
        $activity = Activity::findOrFail($id);

        $activity->update(array_merge(
            $request->validated(),
            ['user_id' => Auth::id()]
            )
        );

        return redirect()->route('activities.show', $activity->id)
                         ->with('success', 'Activity updated successfully');
    }

    public function deleteAction($id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

        if(!$activity) {
            return redirect()->route('activities.index')
                             ->with('error', 'Activity not found');
        }

        $activity->delete();

        return redirect()->route('activities.index')
                         ->with('success', 'Activity deleted successfully');
    }
}
?>
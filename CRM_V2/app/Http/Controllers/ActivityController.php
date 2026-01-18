<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

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
        return view('activities.create');
    }

    public function storeAction(Request $request)
    {
        $validated = $request->validate([
            'client_id' => ['required',
                Rule::exists('clients', 'id')->where(function ($query) {
                $query->where('user_id', Auth::id());
                }),
            ],
            'type' => 'required|string|max:100',
            'activity_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

         Activity::create(array_merge($validated, [
            'user_id' => Auth::id(),
        ]));

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

        return view('activities.edit', [
            'activity' => $activity
        ]);
    }

    public function updateAction(Request $request, $id)
    {
        $activity = Activity::where('id', $id)
                ->where('user_id', Auth::id())
                ->first();

        if(!$activity) {
            return redirect()->route('activities.index')
                             ->with('error', 'Activity not found.');
        }

        $validated = $request->validate([
            'client_id' => ['required',
                Rule::exists('clients', 'id')->where(function ($query) {
                $query->where('user_id', Auth::id());
                }),
            ],
            'type' => 'required|string|max:100',
            'activity_date' => 'required|date',
            'status' => 'required|string|max:50',
        ]);

        $activity->update($validated);

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
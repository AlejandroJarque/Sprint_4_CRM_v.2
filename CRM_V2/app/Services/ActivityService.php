<?php

namespace App\Services;

use App\Models\Activity;
use Illuminate\Support\Facades\Auth;

class ActivityService
{
    public function create(array $data): Activity
    {
        return Activity::create(array_merge(
            $data,
            ['user_id' => Auth::id()]
        ));
    }

    public function update(int $id, array $data): Activity
    {
        $activity = Activity::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $activity->update($data);

        return $activity;
    }

    public function delete(int $id): void
    {
        $activity = Activity::where('id', $id)
            ->where('user_id', Auth::id())
            ->firstOrFail();

        $activity->delete();
    }
}

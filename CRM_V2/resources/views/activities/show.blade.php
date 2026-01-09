@extends('layouts.layout')

@section('title', 'Activity Details')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Activity Details</h1>

    <br>

    @if (session('error'))
        <div class="text-red-500">
            {{ session('error') }}
        </div>
    @endif

    <br>

    <p><strong>Client ID:</strong> {{ $activity->client_id }}</p>
    <p><strong>User ID:</strong> {{ $activity->user_id }}</p>
    <p><strong>Type:</strong> {{ $activity->type }}</p>
    <p><strong>Date:</strong> {{ $activity->activity_date }}</p>
    <p><strong>Status:</strong> {{ $activity->status }}</p>

    <br>

    <div class="flex flex-col items-center">

        <p class="flex flex-col items-center">
            <a class="text-lime-300 hover:text-lime-400" href="{{ route('activities.edit', $activity->id) }}">🖊️ Edit activity</a>
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('activities.index') }}">⬅️ Back to list</a>
        </p>

        <form
            action="{{ route('activities.delete', $activity->id) }}"
            method="POST"
            style="margin-top: 20px;">
            @csrf
            @method('DELETE')
            <button class="text-red-400 hover:text-red-500" onclick="return confirm('Are you sure you want to delete this activity?')">
                🗑️ Delete
            </button>
        </form>

    </div>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
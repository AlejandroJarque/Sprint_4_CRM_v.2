@extends('layout')

@section('title', 'Activities')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Activities</h1>

    <br>

    @if (session('error'))
        <div class="text-red-500">
            {{ session('error') }}
        </div>
    @endif

    <p>
        <a class="text-lime-300 hover:text-lime-400" href="{{ route('activities.create') }}">➕ Add Activity</a>
    </p>

    <br>

    <table class="w-5/6 border border-gray-300 border-collapse">

        <thead>
            <tr class="bg-stone-700 text-stone-100">
                <th class="border border-gray-300 px-4 py-2">Type</th>
                <th class="border border-gray-300 px-4 py-2">Date</th>
                <th class="border border-gray-300 px-4 py-2">Status</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($activities as $activity)
                <tr>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $activity->type }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $activity->activity_date }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $activity->status }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a class="text-lime-300 hover:text-lime-400 pr-4" href="{{ route('activities.show', $activity->id) }}">📒 View</a> 
                        <a class="text-blue-300 hover:text-blue-400 pr-4" href="{{ route('activities.edit', $activity->id) }}">🖊️ Edit</a> 

                        <form
                            action="{{ route('activities.delete', $activity->id) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-400 hover:text-red-500" onclick="return confirm('Are you sure you want to delete this activity?')">
                                🗑️ Delete
                            </button>
                        </form>
                    </td>
                </tr>

            @empty
                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-300">No activities found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
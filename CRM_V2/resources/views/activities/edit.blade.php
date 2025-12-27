@extends('layout')

@section('title', 'Edit Activity')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Edit Activity</h1>

    <br>

    @if (session('error'))
        <div class="text-red-500">
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="text-red-500">
            <p>There are errors in the form. Please review the fields.</p>
        </div>
    @endif

    <form action="{{ route('activities.update', $activity->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label class="pr-13" for="client_id">Client ID</label>
            <input
                type="text"
                class="border-2 border-white border-dotted pl-2"
                id="client_id"
                name="client_id"
                value="{{ old('client_id', $activity->client_id) }}"
            >

            @error('client_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-15" for="user_id">User ID</label>
            <input
                type="text"
                class="border-2 border-white border-dotted pl-2"
                id="user_id"
                name="user_id"
                value="{{ old('user_id', $activity->user_id) }}">

            @error('user_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-19" for="type">Type</label>
            <input
                type="text"
                class="border-2 border-white border-dotted pl-2"
                id="type"
                name="type"
                value="{{ old('type', $activity->type) }}">

            @error('type')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-19" for="activity_date">Date</label>
            <input
                type="date"
                class="border-2 border-white border-dotted pl-2"
                id="activity_date"
                name="activity_date"
                value="{{ old('activity_date', $activity->activity_date) }}">

            @error('activity_date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-16" for="status">Status</label>
            <input
                type="text"
                class="border-2 border-white border-dotted pl-2"
                id="status"
                name="status"
                value="{{ old('status', $activity->status) }}">

            @error('status')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="flex flex-col items-center">
            <button class="text-lime-300 hover:text-lime-400" type="submit">💾 Update activity</button>
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('activities.index') }}">⬅️ Cancel and return to list</a>
        </div>

    </form>

     @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
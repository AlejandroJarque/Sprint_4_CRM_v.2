@extends('layouts.layout')

@section('title', 'Create Activity')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Add New Activity</h1>



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

    <br>

    <form action="{{ route('activities.store') }}" method="POST">
        @csrf

        <div>
            <label class="pr-10" for="client_id">Client</label>
            <select name="client_id" id="client_id"
            class="border-2 border-white border-dotted text-black pl-2" required>

                <option value="">-- Select client --</option>

                @foreach ($clients as $client)
                    <option value="{{$client->id}}"
                        @selected(old('client_id') == $client->id)>
                        {{$client->name}}
                    </option>
                @endforeach
            </select>

            @error('client_id')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="type">Type</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                name="type"
                id="type"
                value="{{ old('type') }}">

            @error('type')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="activity_date">Date</label>
            <input
                type="date"
                class="border-2 border-white border-dotted text-black pl-2"
                name="activity_date"
                id="activity_date"
                value="{{ old('activity_date') }}">

            @error('activity_date')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="status">Status</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                name="status"
                id="status"
                value="{{ old('status') }}">

            @error('status')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="flex flex-col items-center">
            <button class="text-lime-300 hover:text-lime-400" type="submit">💾 Save activity</button>
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('activities.index') }}">⬅️ Back to list</a>
        </div>
    </form>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
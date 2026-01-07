@extends('layouts.layout')

@section('title', 'Dashboard')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Dashboard</h1>

    <br><br>

    <section class="cards">
        <div class="flex items-center">
            <h2 class="pr-19">Total Clients:</h2>
            <p class="pl-2">{{ $clientsCount }}</p>
        </div>

        <br>

        <div class="flex items-center">
            <h2 class="pr-10">Current Activities:</h2>
            <p class="pl-2">{{ $activitiesCount }}</p>
        </div>
    </section>

    <br><br>

    <section class="actions">
        
        <ul>
            <li><a class="text-lime-300 hover:text-lime-400" href="{{ route('clients.create') }}">➕ Add Client</a></li>
            <li><a class="text-blue-300 hover:text-blue-400" href="{{ route('activities.create') }}">➕ Add Activity</a></li>
        </ul>
    </section>

</div>

@endsection

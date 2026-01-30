@extends('layouts.layout')

@section('title', 'Not Found')

@section('content')
<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">
    <div class="container py-5 text-center">
        <h1 class="display-4">404</h1>

        <p class="lead mt-3">
            The page you are looking for does not exist or is unavailable.
        </p>

        <a href="{{ route('home') }}" class="text-blue-300 hover:text-blue-400">
            ⬅️ Back
        </a>
    </div>
</div>
@endsection

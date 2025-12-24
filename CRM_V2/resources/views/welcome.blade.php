
@extends('layout')

@section('simple_header', true)

@section('title', 'Welcome')

@section('content')

    <div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

        <h1 class="text-3xl">Welcome to Nexora</h1>
        <p>Efficient management of customers, interactions, and business activities.</p>

        <div class="flex flex-col items-center -mb-16 mt-16 ">
            <a class="text-lime-300 hover:text-lime-400" href="{{ route('register') }}">Create an account</a>
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('login') }}">Login</a>
        </div>

    </div>

@endsection
@extends('layouts.layout')

@section('title', 'Register')

@section('content')

    <div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

        <h1 class ="text-2xl">Create Account</h1>

        <br><br>

        @if ($errors->any())
            <div class="text-red-500">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group">
                <label class="pr-9" for="name">Name</label>
                <input 
                    type="text"
                    class="border-2 border-white border-dotted text-black pl-2"
                    name="name"
                    id="name"
                    value="{{ old('name') }}"
                    required
                >
            </div>

            <br>

            <div class="form-group">
                <label class="pr-10" for="email">Email</label>
                <input
                    type="email"
                    class="border-2 border-white border-dotted text-black pl-2"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <br>

            <div class="form-group">
                <label class="pr-10" for="password">Password</label>
                <input
                    type="password"
                    class="border-2 border-white border-dotted text-black pl-2"
                    name="password"
                    id="password"
                    required
                >
            </div>

            <br>

            <div class="form-group">
                <label class="pr-10" for="password_confirmation">Confirm Password</label>
                <input
                    type="password"
                    class="border-2 border-white border-dotted text-black pl-2"
                    name="password_confirmation"
                    id="password_confirmation"
                    required
                >
            </div>
            
            <br><br>

            <button class="text-lime-300 hover:text-lime-400 ml-35" type="submit">
                Register
            </button>
        </form>

        <div class="auth-links">
            <p>
                Already have an account?
                <a class="text-blue-300 hover:text-blue-400" href="{{ route('login') }}">Login</a>
            </p>
        </div>

    </div>

@endsection
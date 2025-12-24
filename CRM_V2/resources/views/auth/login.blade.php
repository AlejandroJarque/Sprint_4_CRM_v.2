@extends('layout')

@section('title', 'Login')

@section('content')

    <div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

        <h1 class ="text-2xl">Login</h1>

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

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <label class="pr-10" for="email">Email</label>
                <input
                    type="email"
                    class="border-2 border-white border-dotted pl-2"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <br>

            <div class="form-group">
                <label class="pr-3" for="password">Password</label>
                <input
                    type="password"
                    class="border-2 border-white border-dotted pl-2"
                    name="password"
                    id="password"
                    required
                >
            </div>

            <br><br>

            <button class="text-blue-300 hover:text-blue-400 ml-31" type="submit">
                Login
            </button>
        </form>

        <div class="ml-3">
            <p>
                Don’t have an account?
                <a class="text-lime-300 hover:text-lime-400" href="{{ route('register') }}">Create one</a>
            </p>
        </div>

    </div>

@endsection
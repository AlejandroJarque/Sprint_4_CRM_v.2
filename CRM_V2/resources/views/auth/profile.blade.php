@extends('layout')

@section('title', 'My Profile')

@section('content')

    <div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

        <h1 class="text-2xl">My Profile</h1>

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

        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label class="pr-9" for="name">Name</label>
                <input
                    type="text"
                    class="border-2 border-white border-dotted pl-2"
                    name="name"
                    id="name"
                    value="{{ old('name', $user->name) }}"
                    required
                >
            </div>

            <br>

            <div class="form-group">
                <label class="pr-10" for="email">Email</label>
                <input
                    type="email"
                    class="border-2 border-white border-dotted pl-2"
                    name="email"
                    id="email"
                    value="{{ old('email', $user->email) }}"
                    required
                >
            </div>

            <br><br>

            <button class="text-lime-300 hover:text-lime-400 ml-20" type="submit">
                Save changes
            </button>

            @if (session('success'))
                <div class="ml-10 text-lime-400">
                    {{ session('success') }}
                </div>
            @endif

        </form>

    </div>

@endsection
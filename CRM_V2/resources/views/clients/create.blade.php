@extends('layouts.layout')

@section('title', 'Create Client')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Add New Client</h1>

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

    <br>

    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <div>
            <label class="pr-10" for="name">Name</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                name="name"
                id="name"
                value="{{ old('name') }}"
            >

            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="email">Email</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                name="email"
                id="email"
                value="{{ old('email') }}"
            >

            @error('email')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="phone">Phone</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                name="phone"
                id="phone"
                value="{{ old('phone') }}">

            @error('phone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="address">Address</label>
            <input
                name="address"
                class="border-2 border-white border-dotted text-black pl-2"
                id="address"
            >{{ old('address') }}</input>

            @error('address')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br><br>
        
        <section class="flex flex-col items-center">
            <button class="text-lime-300 hover:text-lime-400" type="submit">💾 Save client</button>
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('clients.index') }}">⬅️ Back to list</a>
        </section>
    </form>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
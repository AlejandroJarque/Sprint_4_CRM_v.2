@extends('layouts.layout')

@section('title', 'Edit Client')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Edit Client</h1>

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

    <form action="{{ route('clients.update', $client->id) }}" method="POST">
        @csrf
        @method('PUT')


        <div>
            <label class="pr-10" for="name">Name</label>
            <input
                type="text"
                class="border-2 border-white border-dotted text-black pl-2"
                id="name"
                name="name"
                value="{{ old('name', $client->name) }}"
            >

            @error('name')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="email">Email</label>
            <input
                type="email"
                class="border-2 border-white border-dotted text-black pl-2"
                id="email"
                name="email"
                value="{{ old('email', $client->email) }}"
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
                id="phone"
                name="phone"
                value="{{ old('phone', $client->phone) }}"
            >

            @error('phone')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label class="pr-10" for="address">Address</label>
            <input
                id="address"
                class="border-2 border-white border-dotted text-black pl-2"
                name="address"
                value="{{ old('address', $client->address) }}">

            @error('address')
                <div class="text-red-500">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div class="flex flex-col items-center">
            <button class="text-lime-300 hover:text-lime-400" type="submit">💾 Update client</button> 
            <a class="text-blue-300 hover:text-blue-400" href="{{ route('clients.index') }}">⬅️ Cancel and return to list</a>
        </div>

    </form>

    <br>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
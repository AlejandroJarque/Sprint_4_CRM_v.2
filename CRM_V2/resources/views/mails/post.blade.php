@extends('layouts.layout')

@section('title', 'Welcome')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Add New Post</h1>

    <br>

    <div>
        <label class="pr-12" for="client_id">Client</label>

        <select
            id="client_id"
            name="client_id"
            class="border-2 border-white border-dotted text-black pl-6 pr-2"
            required
        >
            <option value="">-- Select a client --</option>

            @foreach ($clients as $client)
                <option value="{{ $client->id }}">
                    {{ $client->name }}
                </option>
            @endforeach
    </select>

    </div>

    <br>

    <form action="{{ route('post.send') }}" method="POST">
    @csrf

        <div>
            <label class="pr-10" for="title">Title</label>
            <input
                type="text"
                id="title"
                class="border-2 border-white border-dotted text-black pl-2"
                name="title"
            >
        </div>

        <br>

        <div>
            <label class="pr-12" for="post">Post</label>

            <textarea
                id="post"
                name="post"
                class="border-2 border-white border-dotted text-black pl-6 pr-4"
            ></textarea>
        </div>

        <br>

        @if (session('success'))
            <p class="text-lime-300 mt-2">
                {{ session('success') }}
            </p>
        @endif

        <br>

        <div class="flex flex-col items-center">
            <button class="text-lime-300 hover:text-lime-400" type="submit">Send post</button>     
        </div>

    </form>

</div>

@endsection
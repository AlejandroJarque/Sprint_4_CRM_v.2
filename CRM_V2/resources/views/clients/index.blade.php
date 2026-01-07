@extends('layouts.layout')

@section('title', 'Clients')

@section('content')

<div class="bg-stone-500/90 text-stone-200 m-9 min-h-[28rem] justify-items-center content-center">

    <h1 class="text-2xl">Clients</h1>

    <br>

    @if (session('error'))
        <div class="text-red-500">
            {{ session('error') }}
        </div>
    @endif

    <p>
        <a class="text-lime-300 hover:text-lime-400" href="{{ route('clients.create') }}">➕ Add Client</a>
    </p>

    <br>

    <table class="w-5/6 border border-gray-300 border-collapse">

        <thead>
            <tr class="bg-stone-700 text-stone-100">
                <th class="border border-gray-300 px-4 py-2">Name</th>
                <th class="border border-gray-300 px-4 py-2">Email</th>
                <th class="border border-gray-300 px-4 py-2">Phone</th>
                <th class="border border-gray-300 px-4 py-2">Actions</th>
            </tr>
        </thead>

        <tbody>

            @forelse ($clients as $client)

                <tr class="hover:bg-stone-600/40">
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $client->name }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $client->email }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $client->phone }}</td>
                    <td class="border border-gray-300 px-4 py-2 text-center">
                        <a class="text-lime-300 hover:text-lime-400 pr-4" href="{{ route('clients.show', $client->id) }}">📒 View</a>
                        <a class="text-blue-300 hover:text-blue-400 pr-4" href="{{ route('clients.edit', $client->id) }}">🖊️ Edit</a>

                        <form
                            action="{{ route('clients.delete', $client->id) }}"
                            method="POST"
                            class="inline">

                            @csrf

                            @method('DELETE')

                            <button
                                class="text-red-400 hover:text-red-500"
                                onclick="return confirm('Are you sure you want to delete this client?')">
                                🗑️ Delete
                            </button>

                        </form>
                    </td>
                </tr>

            @empty

                <tr>
                    <td colspan="4" class="text-center py-4 text-gray-300">
                        No clients found.
                    </td>
                </tr>

            @endforelse

        </tbody>

    </table>

    <br>

    @if (session('success'))
        <div class="text-lime-400">
            {{ session('success') }}
        </div>
    @endif

</div>

@endsection
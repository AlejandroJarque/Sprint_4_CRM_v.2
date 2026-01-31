<?php

namespace App\Services;

use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class ClientService
{
    public function create(array $data): Client
    {
        return Client::create(array_merge(
            $data,
            ['user_id' => Auth::id()]
        ));
    }

    public function update(int $id, array $data): Client
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $client->update($data);

        return $client;
    }

    public function delete(int $id): void
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        $client->delete();
    }
}

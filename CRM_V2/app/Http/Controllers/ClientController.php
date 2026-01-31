<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ClientService;
use App\Http\Requests\StoreUpdateClientRequest;

class ClientController extends Controller
{
    public function indexAction()
    {
        $clients = Client::where('user_id', Auth::id())
            ->orderBy('name')
            ->paginate(5);

        return view('clients.index', compact('clients'));
    }

    public function createAction()
    {
        return view('clients.create');
    }

    public function storeAction(StoreUpdateClientRequest $request, ClientService $clientService)
    {
        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'email'   => 'nullable|email:rfc,dns|max:150',
            'phone'   => 'nullable|regex:/^[0-9\+\-\s]{7,20}$/',
            'address' => 'nullable|string|max:255',
        ]);

        $clientService->create($validated);

        return redirect()->route('clients.index')
                         ->with('success', 'Client registered successfully.');
    }

    public function showAction($id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('clients.show', compact('client'));
    }

    public function editAction($id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->firstOrFail();

        return view('clients.edit', compact('client'));
    }

    public function updateAction(StoreUpdateClientRequest $request, $id, ClientService $clientService)
    {

        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'email'   => 'nullable|email:rfc,dns|max:150',
            'phone'   => 'nullable|regex:/^[0-9\+\-\s]{7,20}$/',
            'address' => 'nullable|string|max:255',
        ]);

        $client = $clientService->update($id, $validated);

        return redirect()->route('clients.index')
                         ->with('success', 'Client updated successfully.');
    }

    public function deleteAction($id, ClientService $clientService)
    {

        $clientService->delete($id);

        return redirect()->route('clients.index')
                         ->with('success', 'Client deleted successfully.');
    }
}

?>
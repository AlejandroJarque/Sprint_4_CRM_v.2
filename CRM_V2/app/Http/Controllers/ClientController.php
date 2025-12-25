<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function indexAction()
    {
        $clients = Client::where('user_id', Auth::id())->get();

        return view('clients.index', compact('clients'));
    }

    public function createAction()
    {
        return view('clients.create');
    }

    public function storeAction(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'email'   => 'nullable|email:rfc,dns|max:150',
            'phone'   => 'nullable|regex:/^[0-9\+\-\s]{7,20}$/',
            'address' => 'nullable|string|max:255',
        ]);

        Client::create(array_merge($validated, [
            'user_id' => Auth::id(),
        ]));

        return redirect()->route('clients.index')
                         ->with('success', 'Client registered successfully.');
    }

    public function showAction($id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if (!$client) {
            return redirect()->route('clients.index')
                             ->with('error', 'Client not found.');
        }

        return view('clients.show', compact('client'));
    }

    public function editAction($id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if (!$client) {
            return redirect()->route('clients.index')
                             ->with('error', 'Client not found.');
        }

        return view('clients.edit', compact('client'));
    }

    public function updateAction(Request $request, $id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if (!$client) {
            return redirect()->route('clients.index')
                             ->with('error', 'Client not found.');
        }

        $validated = $request->validate([
            'name'    => 'required|string|min:2|max:100|regex:/^[A-Za-zÀ-ÿ\s]+$/',
            'email'   => 'nullable|email:rfc,dns|max:150',
            'phone'   => 'nullable|regex:/^[0-9\+\-\s]{7,20}$/',
            'address' => 'nullable|string|max:255',
        ]);

        $client->update($validated);

        return redirect()->route('clients.index')
                         ->with('success', 'Client updated successfully.');
    }

    public function deleteAction($id)
    {
        $client = Client::where('id', $id)
                        ->where('user_id', Auth::id())
                        ->first();

        if (!$client) {
            return redirect()->route('clients.index')
                             ->with('error', 'Client not found.');
        }

        $client->delete();

        return redirect()->route('clients.index')
                         ->with('success', 'Client deleted successfully.');
    }
}

?>
<?php

namespace App\Http\Controllers;

use App\Mail\CreateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;

class MailController extends Controller
{
    public function indexAction()
    {
        $clients = Client::where('user_id', Auth::id())
            ->orderBy('name')
            ->get();

        return view('mails.post', compact('clients'));
    }

    public function sendAction(Request $request)
    {
        $data = $request->validate([
        'title' => 'required|string',
        'post'  => 'required|string',
        'client_id' => 'required|exist:clients,id',
    ]);

        $client = Client::where('id', $data['client_id'])
            ->where('user_id', Auth::id())
            ->firtOrFail();

        Mail::to('user@email.com')
            ->send(new CreateMail($data['title'], $data['post']));
        
        return redirect()->route('post')->with('success', 'Post send correctly');
    }
}

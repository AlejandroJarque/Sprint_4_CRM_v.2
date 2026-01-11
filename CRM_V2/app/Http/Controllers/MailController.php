<?php

namespace App\Http\Controllers;

use App\Mail\CreateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController extends Controller
{
    public function indexAction()
    {

        return view('mails.post');
    }

    public function sendAction(Request $request)
    {
        $data = $request->validate([
        'title' => 'required|string',
        'post'  => 'required|string',
    ]);

        Mail::to('user@email.com')
            ->send(new CreateMail($data['title'], $data['post']));
        
        return redirect()->route('post')->with('success', 'Post send correctly');
    }
}

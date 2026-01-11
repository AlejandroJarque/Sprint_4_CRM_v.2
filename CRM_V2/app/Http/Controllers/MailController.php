<?php

namespace App\Http\Controllers;

use App\Mail\CreateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class MailController extends Controller
{
    public function send()
    {
        Mail::to('user@email.com')
            ->send(new CreateMail());
    }
}

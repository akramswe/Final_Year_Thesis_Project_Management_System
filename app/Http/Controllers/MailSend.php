<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
class MailSend extends Controller
{
    public function mailsend(Request $request)
    {
        $details = [
            'title' => $request->get('subject'),
            'body' => $request->get('body')
            
        ];
        $email = ['to' =>$request->get('to')];

        \Mail::to($email)->send(new SendMail($details));
        return view('emails.thanks');
    }

     public function create()
    {
        return view('emails.compose');
    }
}
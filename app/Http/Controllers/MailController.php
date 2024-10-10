<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Mailcontroller extends Controller
{
    public function Contactmail(Request $request)
    {
        
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        // Prepare the data to pass to the Mailable
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];

        Mail::to('hello@example.com')->send(new Contact($data));
        return redirect()->back();
    }
}

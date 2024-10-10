<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use App\Mail\User;

use App\Mail\NewsletterMail;

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
    public function sendNewsletter(Request $request)
    {
        // Validate the incoming request data for the newsletter
        $request->validate([
            'content' => 'required|string', // Adjust validation as needed
        ]);

        // Retrieve subscribers (adjust as necessary for your user model)
        $subscribers = User::where('subscribed', true)->get(); 

        // Send the newsletter to each subscriber
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new NewsletterMail($request->input('content')));
        }

        return response()->json(['message' => 'Newsletter sent successfully!']);
    }

}

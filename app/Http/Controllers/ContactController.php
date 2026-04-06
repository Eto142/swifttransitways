<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Mail; // import Mail facade
use App\Mail\ContactMail;            // import your mailable

class ContactController extends Controller
{
    // public function submit(Request $request)
    // {
    //     // Validate form inputs
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255',
    //         'subject' => 'required|string|max:255',
    //         'message' => 'required|string',
    //     ]);

    //     // Send email
    //     Mail::to('support@santashiplogistics.org')->send(new ContactMail($request->all()));

    //     // Redirect back with success message
    //     return back()->with('success', 'Your message has been sent successfully.');
    // }



    public function send(Request $request)
    {
        $request->validate([
            'text-440' => 'required|string|max:255', // Name
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'shipment' => 'required|string',
            'message' => 'required|string|max:2000',
        ]);

        $data = [
            'name' => $request->input('text-440'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'shipment' => $request->input('shipment'),
            'message' => $request->input('message'),
        ];

        // Send email to support@santashiplogistics.org
        Mail::to('support@santashiplogistics.org')->send(new ContactMail($data));

        return back()->with('success', 'Your message has been sent successfully.');
    }
}



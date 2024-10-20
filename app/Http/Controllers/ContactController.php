<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;


use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
public function showForm()
{
    return view('contact'); // create contact.blade.php in resources/views
}

public function submitForm(Request $request)
{
    // Validate the input
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string',
    ]);

    // Send email or handle the contact form submission
    Mail::to('Hrm1@gmail.com')->send(new \App\Mail\ContactFormMail($request->all()));

    return back()->with('success', 'Your message has been sent!');
}
}
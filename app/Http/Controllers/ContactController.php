<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::all();
        return view('contact', ['contacts' => $contacts]);
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Contact::create($validatedData);
        $contacts = Contact::all();
        return view('contact', compact('contacts'))->with('success', 'Message sent successfully!');
    }
}

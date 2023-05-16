<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->paginate(10);
        return view('contact', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        $validatedData = $request->validated();

        Contact::create($validatedData);
        return redirect()->route('contact.show')->with('success',
            ['message' => 'Message sent successfully!', 'delay' => 4]);
    }
}

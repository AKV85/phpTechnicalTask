<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Exception;

class ContactController extends Controller
{
    public function show()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('contact', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        try {
            $validatedData = $request->validated();
            Contact::create($validatedData);
            return redirect()->route('contact.show')->with('success',
                [
                    'message' => 'Message sent successfully!',
                    'delay' => 4
                ]);
        } catch (Exception $e) {
            return redirect()->back()->with('error',
                [
                    'message' => 'Something wrong. Try again.',
                    'delay' => 4
                ]);
        }
    }
}

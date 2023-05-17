<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Http\Managers\FlashMessageManager;
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
            Contact::create($request->validated());

            FlashMessageManager::success('Message sent successfully!', 4);
        } catch (Exception $e) {
            FlashMessageManager::error('Something wrong. Try again.', 4);
        }
        return redirect()->route('contact.show');
    }
}

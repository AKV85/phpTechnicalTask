<?php

namespace App\Http\Controllers;

use App\Http\Repositories\ContactRepository;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Http\Managers\FlashMessageManager;
use Exception;

class ContactController extends Controller
{
    protected $contactRepository;
    public function __construct(ContactRepository $contactRepository)
    {
        $this->contactRepository = $contactRepository;
    }
    public function show()
    {
        $contacts = $this->contactRepository->getAllContacts();
        return view('contact', compact('contacts'));
    }

    public function store(ContactRequest $request)
    {
        try {
            $this->contactRepository->createContact($request->validated());

            FlashMessageManager::success('Message sent successfully!', 4);
        } catch (Exception $e) {
            FlashMessageManager::error('Something wrong. Try again.', 4);
        }
        return redirect()->route('contact.show');
    }
}

<?php

namespace App\Http\Repositories;

use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class ContactRepository implements ContactRepositoryInterface
{
    public function getAllContacts()
    {
        return Contact::latest()->paginate(10);
    }

    public function createContact($data)
    {
        return Contact::create($data);
    }

    public function getContactById($id)
    {
        return Contact::find($id);
    }

    public function updateContact($contact, $data)
    {
        return $contact->update($data);
    }

    public function deleteContact($contact)
    {
        return $contact->delete();
    }

    public function getContactsWhereMessageLengthGreaterThan($length)
    {
        return DB::table('contacts')
            ->whereRaw('CHAR_LENGTH(message) > ?', [$length])
            ->get();
    }
}

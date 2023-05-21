<?php

namespace App\Http\Repositories;

interface ContactRepositoryInterface
{
public function getAllContacts();
public function createContact($data);
public function getContactById($id);
public function updateContact($contact, $data);
public function deleteContact($contact);
public function getContactsWhereMessageLengthGreaterThan($length);
}

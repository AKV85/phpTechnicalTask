<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact');
    }


    public function store(Request $request)
    {
        // Обработка и сохранение данных из формы

        return redirect()->back()->with('success', 'Message sent successfully!');
    }
}

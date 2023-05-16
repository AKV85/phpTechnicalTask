@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message" required></textarea>
        </div>

        <button type="submit">Submit</button>
    </form>
@endsection

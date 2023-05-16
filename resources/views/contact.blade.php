@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name">
            @error('name')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email">
            @error('email')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="message">Message:</label>
            <textarea name="message" id="message"></textarea>
            @error('message')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <h2>Saved Contacts</h2>
    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Created Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($contacts as $contact)
            <tr>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

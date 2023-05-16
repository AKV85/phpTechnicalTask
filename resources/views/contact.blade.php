@extends('layouts.app')

@section('content')
    <h1 class="title">Contact Us</h1>

    <form method="POST" action="{{ route('contact.store') }}" class="form">
        @csrf

        <div class="form-group">
            <label for="name" class="label">Name:</label>
            <input type="text" name="name" id="name" class="input">
            @error('name')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="label">Email:</label>
            <input type="email" name="email" id="email" class="input">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="message" class="label">Message:</label>
            <textarea name="message" id="message" class="input"></textarea>
            @error('message')
            <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="button">Submit</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success" id="success-message"
             style="display: {{ session('success') ? 'block' : 'none' }}"
             data-delay="{{ session('success')['delay'] ?? 0 }}">
            {{ session('success')['message'] ?? '' }}
        </div>

    @endif

    <h2 class="subtitle">Saved Contacts</h2>
    <table class="table">
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
    <div class="pagination display:flex justify-content-center">
        {{ $contacts->links() }}
    </div>

@endsection

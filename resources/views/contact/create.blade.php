@extends('layouts.app')

@section('content')
    <h1>Contact Us</h1>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required></textarea>
        <button type="submit">Send</button>
    </form>
@endsection

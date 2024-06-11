@extends('layouts.app')

@section('content')
    <h1>Reply to Contact Form</h1>
    <form action="{{ route('contact-reply.store') }}" method="POST">
        @csrf
        <input type="hidden" name="contact_form_id" value="{{ $contactForm->id }}">
        <label for="reply">Reply:</label>
        <textarea name="reply" id="reply" required></textarea>
        <button type="submit">Send Reply</button>
    </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>Add FAQ Question</h1>
    <form action="{{ route('faq-questions.store') }}" method="POST">
        @csrf
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" required>
        <label for="answer">Answer:</label>
        <textarea name="answer" id="answer" required></textarea>
        <button type="submit">Save</button>
    </form>
@endsection

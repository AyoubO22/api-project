@extends('layouts.app')

@section('content')
    <h1>Edit FAQ Question</h1>
    <form action="{{ route('faq-questions.update', $faqQuestion) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id" required>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ $faqQuestion->category_id == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <label for="question">Question:</label>
        <input type="text" name="question" id="question" value="{{ $faqQuestion->question }}" required>
        <label for="answer">Answer:</label>
        <textarea name="answer" id="answer" required>{{ $faqQuestion->answer }}</textarea>
        <button type="submit">Save</button>
    </form>
@endsection

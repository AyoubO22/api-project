<!-- resources/views/admin/posed_questions/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>Posed Questions</h1>

    @foreach ($posedQuestions as $posedQuestion)
        <p><strong>{{ $posedQuestion->question }}</strong> by {{ $posedQuestion->user ? $posedQuestion->user->name : 'Anonymous' }}</p>
        <form action="{{ route('admin.posed-questions.answer', $posedQuestion->id) }}" method="POST">
            @csrf
            <select name="category_id" required>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <textarea name="answer" required></textarea>
            <button type="submit">Answer</button>
        </form>
    @endforeach
@endsection

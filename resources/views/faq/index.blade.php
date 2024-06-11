<!-- resources/views/faq/index.blade.php -->

@extends('layouts.app')

@section('content')
    <h1>FAQ</h1>

    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
        @foreach ($category->questions as $question)
            <p><strong>{{ $question->question }}</strong>: {{ $question->answer }}</p>
        @endforeach
    @endforeach

    @auth
        <form action="{{ route('faq.pose') }}" method="POST">
            @csrf
            <textarea name="question" required></textarea>
            <button type="submit">Pose Question</button>
        </form>
    @else
        <p><a href="{{ route('login') }}">Login</a> to pose a question.</p>
    @endauth
@endsection

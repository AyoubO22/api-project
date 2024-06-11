@extends('layouts.app')

@section('content')
    <h1>{{ $news->title }}</h1>
    <img src="{{ asset('storage/' . $news->cover_image) }}" alt="Cover Image">
    <p>{{ $news->content }}</p>
    <p>Published on {{ $news->published_at }}</p>

    <h2>Comments</h2>
    @foreach ($news->comments as $comment)
        <p>{{ $comment->user->name }}: {{ $comment->content }}</p>
    @endforeach

    @auth
        <h3>Add a Comment</h3>
        @include('comments.create', ['news' => $news])
    @endauth
@endsection

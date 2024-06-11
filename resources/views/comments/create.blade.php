@extends('layouts.app')

@section('content')
    <h1>Add Comment</h1>
    <form action="{{ route('comments.store') }}" method="POST">
        @csrf
        <input type="hidden" name="news_id" value="{{ $news->id }}">
        <label for="content">Comment:</label>
        <textarea name="content" id="content" required></textarea>
        <button type="submit">Add Comment</button>
    </form>
@endsection

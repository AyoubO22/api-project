@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Latest News</h1>
        @foreach($news as $newsItem)
            <div class="news-item">
                <h2><a href="{{ route('news.show', $newsItem->id) }}">{{ $newsItem->title }}</a></h2>
                <p>{{ $newsItem->publish_date }}</p>
                <img src="{{ asset('storage/' . $newsItem->cover_image) }}" alt="{{ $newsItem->title }}" width="100">
                <p>{{ Str::limit($newsItem->content, 150) }}</p>
            </div>
        @endforeach
    </div>
@endsection

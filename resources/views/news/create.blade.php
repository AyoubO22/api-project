@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create News Item</h1>
        <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea class="form-control" id="content" name="content" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="cover_image">Cover Image</label>
                <input type="file" class="form-control-file" id="cover_image" name="cover_image">
            </div>
            <div class="form-group">
                <label for="publish_date">Publish Date</label>
                <input type="date" class="form-control" id="publish_date" name="publish_date" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection

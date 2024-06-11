@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Profile</h1>
        <form action="{{ route('profile.update', $user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="form-group">
                <label for="name">Username</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="birthday">Birthday</label>
                <input type="date" name="birthday" id="birthday" class="form-control" value="{{ $user->birthday }}" required>
            </div>
            <div class="form-group">
                <label for="about">About Me</label>
                <textarea name="about" id="about" class="form-control">{{ $user->about }}</textarea>
            </div>
            <div class="form-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar" class="form-control">
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100">
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
        </form>
    </div>
@endsection

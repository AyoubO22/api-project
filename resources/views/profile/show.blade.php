@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $user->name }}'s Profile</h1>
        <p><strong>Birthday:</strong> {{ $user->birthday }}</p>
        <p><strong>About Me:</strong> {{ $user->about }}</p>
        <img src="{{ asset('storage/' . $user->avatar) }}" alt="Avatar" width="100">
        <a href="{{ route('profile.edit', $user->id) }}" class="btn btn-warning">Edit Profile</a>
    </div>
@endsection

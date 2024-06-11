<!DOCTYPE html>
<html>
<head>
    <title>Game Details</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #343a40;
        }

        /* Container styling */
        .container {
            max-width: 960px;
            margin: 50px auto;
            padding: 0 15px;
        }

        /* Header styling */
        h1 {
            font-size: 2.5rem;
            color: #343a40;
            margin-bottom: 20px;
        }

        /* Button styling */
        .btn {
            display: inline-block;
            font-weight: 400;
            color: #fff;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            background-color: #007bff;
            border: 1px solid transparent;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn:hover {
            text-decoration: none;
            opacity: 0.9;
        }

        /* Card styling */
        .card {
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            background-color: #fff;
            margin-top: 20px;
        }

        .card-header {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            border-bottom: 1px solid #dee2e6;
            border-top-left-radius: 0.25rem;
            border-top-right-radius: 0.25rem;
        }

        .card-header h2 {
            margin: 0;
        }

        .card-body {
            padding: 15px;
        }

        .card-body p {
            margin-bottom: 10px;
            font-size: 1.1rem;
        }

        .card-body img {
            display: block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Game Details</h1>
    <a href="{{ route('games.index') }}" class="btn btn-primary">Back to Games List</a>
    <div class="card mt-3">
        <div class="card-header">
            <h2>{{ $game->Title }}</h2>
        </div>
        <div class="card-body">
            <p><strong>Genre:</strong> {{ $game->Genre }}</p>
            <p><strong>Platform:</strong> {{ $game->Platform }}</p>
            <p><strong>Developer:</strong> {{ $game->Developer }}</p>
            <img src="{{ asset('storage/' . $game->Image) }}" alt="{{ $game->Title }}" width="300">
        </div>
    </div>
</div>
</body>
</html>

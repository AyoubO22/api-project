<!DOCTYPE html>
<html>
<head>
    <title>Edit Game</title>
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

        /* Alert styling */
        .alert {
            padding: 15px;
            border: 1px solid transparent;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        .alert-danger {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }

        .alert-danger ul {
            list-style-type: none;
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

        /* Form styling */
        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-control {
            display: block;
            width: 100%;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            color: #495057;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #ced4da;
            border-radius: 0.25rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .form-control-file {
            display: block;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Game</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('games.update', $game->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="Title">Title:</label>
            <input type="text" name="Title" class="form-control" value="{{ $game->Title }}" required>
        </div>
        <div class="form-group">
            <label for="Genre">Genre:</label>
            <input type="text" name="Genre" class="form-control" value="{{ $game->Genre }}" required>
        </div>
        <div class="form-group">
            <label for="Platform">Platform:</label>
            <input type="text" name="Platform" class="form-control" value="{{ $game->Platform }}" required>
        </div>
        <div class="form-group">
            <label for="Developer">Developer:</label>
            <input type="text" name="Developer" class="form-control" value="{{ $game->Developer }}" required>
        </div>
        <div class="form-group">
            <label for="Image">Image:</label>
            <input type="file" name="Image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Game</button>
    </form>
</div>
</body>
</html>

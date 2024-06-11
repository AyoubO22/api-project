<!DOCTYPE html>
<html>
<head>
    <title>Games List</title>
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

        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
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

        .btn-info {
            background-color: #17a2b8;
            border-color: #17a2b8;
        }

        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn:hover {
            text-decoration: none;
            opacity: 0.9;
        }

        /* Table styling */
        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody + tbody {
            border-top: 2px solid #dee2e6;
        }

        .table-bordered {
            border: 1px solid #dee2e6;
        }

        .table-bordered th,
        .table-bordered td {
            border: 1px solid #dee2e6;
        }

        .table-bordered thead th,
        .table-bordered thead td {
            border-bottom-width: 2px;
        }

        .mt-3 {
            margin-top: 1rem !important;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Games List</h1>
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <a href="{{ route('games.create') }}" class="btn btn-primary">Add New Game</a>
    <table class="table table-bordered mt-3">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Platform</th>
            <th>Developer</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($games as $game)
            <tr>
                <td>{{ $game->id }}</td>
                <td>{{ $game->Title }}</td>
                <td>{{ $game->Genre }}</td>
                <td>{{ $game->Platform }}</td>
                <td>{{ $game->Developer }}</td>
                <td><img src="{{ asset('storage/' . $game->Image) }}" alt="{{ $game->Title }}" width="100"></td>
                <td>
                    <a href="{{ route('games.show', $game->id) }}" class="btn btn-info">View</a>
                    <a href="{{ route('games.edit', $game->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('games.destroy', $game->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</body>
</html>

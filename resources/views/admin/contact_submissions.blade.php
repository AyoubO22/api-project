<!DOCTYPE html>
<html>
<head>
    <title>Contact Form Submissions</title>
</head>
<body>
<h1>Contact Form Submissions</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<ul>
    @foreach ($submissions as $submission)
        <li>
            <p><strong>Name:</strong> {{ $submission->name }}</p>
            <p><strong>Email:</strong> {{ $submission->email }}</p>
            <p><strong>Message:</strong> {{ $submission->message }}</p>

            <form action="{{ route('contact.reply', $submission->id) }}" method="POST">
                @csrf
                <label for="reply">Reply:</label>
                <textarea id="reply" name="reply" required></textarea>
                <button type="submit">Send Reply</button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>

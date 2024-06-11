<!DOCTYPE html>
<html>
<head>
    <title>Contact Us</title>
</head>
<body>
<h1>Contact Us</h1>

@if (session('success'))
    <p>{{ session('success') }}</p>
@endif

<form action="{{ route('contact.submit') }}" method="POST">
    @csrf
    <label for="name">Name:</label>
    <input type="text" id="name" name="name" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" required></textarea>

    <button type="submit">Send</button>
</form>
</body>
</html>

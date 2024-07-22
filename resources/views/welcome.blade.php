{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Chat with AI Therapist</title>
</head>
<body>
    <form id="chatForm" method="POST" action="{{ route('chat.response') }}">
        @csrf
        <input type="text" id="message" name="message" placeholder="Enter your message">
        <button type="submit">Send</button>
    </form>

    <div id="responseContainer">
        @if(isset($response))
            <h3>AI Response:</h3>
            <p>{{ $response }}</p>
        @endif
    </div>
</body>
</html> --}}

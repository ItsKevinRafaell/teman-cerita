<!DOCTYPE html>
<!-- Coding by CodingNepal || www.codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <!-- Boxicons CSS -->
    <link href="{{ url("https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css") }}" rel="stylesheet" />


    <!-- Bootstrap CSS -->
     <link href="{{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css") }}" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


    <title>Chat</title>
    <link rel="stylesheet" href="{{ asset("/assets/dashboard.css") }}" />
  </head>
  <body>

    @include("components.sidebar")


    @yield("user-content")


    <!-- JavaScript -->
    <script src="/assets/dashboard.js"></script>

    <!-- Bootstrap JS -->
     <script src="{{ url("https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js") }}" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
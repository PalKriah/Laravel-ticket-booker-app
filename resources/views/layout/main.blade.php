<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Ticket booker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
  <x-navbar />
  <div class="container" id="content-area">
    @yield('content')
    </p>
  </div>
  <x-footer />
</body>

</html>
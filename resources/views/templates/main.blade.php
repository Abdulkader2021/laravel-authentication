<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>

    <title>{{ config('app.name', 'laravel-authentication') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body class="antialiased">
<main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
    <main class="container">
            @yield('content')
        </main>
</main>

</body>
</html>

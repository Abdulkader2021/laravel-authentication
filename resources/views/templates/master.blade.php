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


<div class="relative flex items-top justify-center min-h-screen sm:items-center sm:pt-0">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('storage/assets/images/logo.svg') }}" alt="logo" class="logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="navbar-text">
                <ul class="navbar-nav">

                    <li class="nav-item active">
                        <a class="nav-link" href="javascript:void(0); "> {{ Auth::user()->name }}</a>
                    </li>

                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                        <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                            @csrf
                        </form>

                    </li>
                </ul>
            </span>
        </div>
    </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>



</div>




</body>
</html>

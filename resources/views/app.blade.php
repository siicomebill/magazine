<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Routes -->
        @routes

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        @if (env('APP_ENV') == 'production')
        <link rel="stylesheet" href="{{ asset('css/app.min.css') }}">
        @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        @endif

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        @if (env('APP_ENV') == 'production')
        <script src="{{ asset('js/app.min.js') }}" defer></script>
        @else
        <script src="{{ asset('js/app.js') }}" defer></script>
        @endif
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>

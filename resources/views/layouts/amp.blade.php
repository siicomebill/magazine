<!DOCTYPE html>
<html ⚡ lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>
            @yield('title', 'Home') · {{ config('app.name', 'Bill') }}
        </title>

        <link rel="canonical" href="{{ request()->canonicalUrl }}">

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script async src="https://cdn.ampproject.org/v0.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.2.1/dist/alpine.js" defer></script>
    </head>
    <body class="font-sans antialiased">
        <header>
            <p class="text-2xl text-center my-2 font-banner"> {{config("app.name")}} </p>
        </header>
        
        <main class="font-sans text-gray-900 antialiased bg-white container mx-auto my-6 rounded-lg shadow-lg">
            @yield('page')
        </main>
        
        <footer>
            <p class="text-sm text-gray-600 text-center my-2"> Torna al <a class="text-primary underline font-bold" href="{{request()->canonicalUrl}}">sito originale</a>. </p>
        </footer>
    </body>
</html>

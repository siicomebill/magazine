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
    <body class="font-sans antialiased bg-dark text-white banner">
        <header class="py-6">
            @if (isset($config['logo']['big']))

                <a href="/amp">
                    <img src="{{ $config['logo']['big'] }}" alt="Logo" class="sm:max-w-sm mx-auto" />
                </a>

            @else
                <a class="block text-2xl text-center my-2 font-banner" href="/amp"> {{config("app.name")}} </a>
            @endif

            
            @if (isset($config['banner']))
                <div class="text-center font-handwritten">
                    {!! prosemirrorToHtml($config['banner']) !!}
                </div>
            @endif
        </header>
        
        <main class="font-sans text-gray-900 antialiased bg-white container mx-auto my-6 rounded-lg shadow-lg">
            @yield('page')
        </main>
        
        <footer class="footer py-10 px-4">
            <p class="text-sm text-center my-2">Stai usando la <strong>versione lite</strong>. Torna al <a class="text-primary underline font-bold" href="{{request()->canonicalUrl}}">sito originale</a>. </p>

            <section>
                @if (isset($configuration['footer']))
                    <div class="mx-auto text-center py-6">
                        {!! prosemirrorToHtml($configuration['footer']) !!}
                    </div>
                @endif
                
    
                <div class="text-center">
                    <div
                        class="my-5 py-5 mx-auto text-center text-black uppercase font-banner flex justify-center items-center gap-4"
                    >
                        <a
                            href="https://www.instagram.com/siicomebill/"
                            target="_blank"
                            rel="noopener"
                            class="underline text-primary rounded-full flex justify-center items-center"
                        >
                            Instagram
                        </a>

                        <a
                            href="https://www.facebook.com/siicomebill/"
                            target="_blank"
                            rel="noopener"
                            class="underline text-primary rounded-full flex justify-center items-center"
                        >
                            Facebook
                        </a>
    
                        <a
                            href="https://www.github.com/siicomebill/"
                            target="_blank"
                            rel="noopener"
                            class="underline text-primary rounded-full flex justify-center items-center"
                        >
                            GitHub
                        </a>
                    </div>
    
                    <p class="py-10">
                        &copy; <strong>{{ config('app.name') }}</strong>
                        {{ date("Y") }}
                    </p>
    
                    <p>
                        Made with
                        <span class="font-handwritten text-primary text-4xl">LOVE</span> by
                        <a
                            href="https://mattia.codes/"
                            rel="noopener"
                            target="_blank"
                            class="emphasized"
                        >
                            Mattia Sinisi
                        </a>
                        and
                        <a
                            href="https://www.linkedin.com/in/federica-spallino-5a7827114/"
                            rel="noopener"
                            target="_blank"
                            class="emphasized"
                        >
                            Federica Spallino
                        </a>
                    </p>
                </div>
            </section>
        </footer>
    </body>
</html>

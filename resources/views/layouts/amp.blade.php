<!DOCTYPE html>
<html ⚡ lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="/favicon.ico">

        <!-- Meta Tags -->
        @metas

        <!-- Routes -->
        @routes

        <!-- RSS Feed -->
        @include('feed::links')

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script async src="https://cdn.ampproject.org/v0.js"></script>

        <!-- AMP Boilerplate -->
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    </head>
    <body class="font-sans antialiased bg-dark text-white banner">
        <div class="sticky top-0 py-2 bg-dark">
            <p class="text-sm text-center my-0">Stai usando la <strong>versione lite</strong>. 👉 <a class="text-primary underline font-bold" href="{{request()->canonicalUrl}}">Pagina originale</a>. </p>
        </div>

        <header class="py-6">
            @if (isset($config['logo']['big']))

                <a href="/amp">
                    <img src="{{ $config['logo']['big'] }}" alt="Logo" class="sm:max-w-sm mx-auto" />
                </a>

            @else
                <a class="block text-2xl text-center my-2 font-banner" href="/amp"> {{config("app.name")}} </a>
            @endif

            
            @if (isset($config['banner']))
                <div class="text-center font-handwritten content">
                    {!! prosemirrorToHtml($config['banner']) !!}
                </div>
            @endif
        </header>
        
        <main class="font-sans text-gray-900 antialiased bg-white container mx-auto my-6 rounded-lg shadow-lg">
            @yield('page')
        </main>
        
        <footer class="footer py-10 px-4">
            <section>
                @if (isset($configuration['footer']))
                    <div class="mx-auto text-center py-6 content">
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

            <p class="text-center pt-10">⚡</p>
        </footer>
    </body>
</html>

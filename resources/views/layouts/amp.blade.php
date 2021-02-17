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
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

        <!-- AMP Boilerplate -->
        <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>
    </head>
    <body class="font-sans antialiased bg-dark text-white banner">
        <div class="sticky top-0">
            <p class="text-sm text-center my-0 py-2 bg-dark">Stai usando la <strong>versione lite</strong>. 👉 <a class="text-primary underline font-bold" href="{{request()->canonicalUrl}}">Pagina originale</a>. </p>
            
            <nav class="top-0 left-0 right-0 z-3 px-4 bg-white text-dark shadow-lg rounded-b-lg">
                <div
                    class="container mx-auto flex items-center justify-between flex-wrap"
                >
                    <div class="flex items-center flex-shrink-0 py-4 px-2">
                        <a href="{{ route('amp.home') }}" class="text-2xl tracking-tight font-banner uppercase" >
                            <span class="hidden lg:block">{{ $app["name"] }}</span>
                            <span class="lg:hidden block"><img class="h-10 w-10" src="/favicon.ico" /></span>
                        </a>
                    </div>

                    @component('components.dropdown', ["mobileOnly" => true, "class" => "lg:mx-auto"])
                        @slot('body')
                            <div class="lg:block lg:order-last lg:px-0 lg:pt-4 px-4 pt-2">
                                <div class="py-4 flex justify-end">
                                    @auth
                                        <p>
                                            <a href="{{route('dashboard') }}" class="uppercase font-banner text-primary underline">Bacheca</a>
                                        </p>
                                    @endauth
        
                                    @guest
                                        <div class="lg:grid grid-cols-2 gap-2 font-banner uppercase">
                                            <a
                                                href="{{route('login')}}"
                                                class="block text-sm text-center px-4 py-2 leading-none border rounded-full bg-primary border-none text-black lg:mt-0"
                                                >Login</a
                                            >
                                            <a
                                                href="{{route('register')}}"
                                                class="block text-sm text-center text-black px-4 py-2 leading-none lg:mt-0"
                                                >Registrati</a
                                            >
                                        </div>
                                    @endguest
                                </div>
        
                                @component('components.dropdown', ["mobileOnly" => true])
                                    @slot('title')
                                        <span class="font-banner uppercase">Sezioni</span>
                                    @endslot

                                    @slot('body')
                                    <nav class="bg-white text-dark border lg:px-6 lg:py-1 px-4 py-3 font-banner flex justify-end items-end rounded-t-lg">
                                        @if (isset($navbar["categories"]))
                                            <div class="text-sm lg:mb-0 mb-4 lg:inline-block">
                                                <ul v-if="$page.navbar.categories" class="lg:flex">
                                                    @foreach ($navbar["categories"] as $category)
                                                        <li
                                                            class="lg:mx-3 h-10 flex"
                                                        >
                                                            <a
                                                                class="flex flex-grow cursor-pointer my-auto"
                                                                href="{{ route('amp.categories.articles', $category->id) }}"
                                                            >
                                                                <span class="cursor-pointer block my-auto font-bold uppercase">{{ $category->name }}</span>
                                                            </a>
                                                            <div class="flex">
                                                                @if (isset($category->children) && $category->children->count() > 0)
                                                                    <div class="flex-grow my-auto capitalize rounded-lg pr-3 px-4" >
                                                                        @component('components.dropdown')
                                                                            @slot('body')
                                                                                @foreach ($category->children as $child)
                                                                                    <a class="text-sm block lg:flex-grow pb-3" href="{{route('amp.categories.articles', $child->id)}}" > {{ $child->name }}</a >
                                                                                @endforeach
                                                                            @endslot
                                                                        @endcomponent
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </nav>
                                    @endslot
                                @endcomponent
                            </div>
                        @endslot
                    @endcomponent
                </div>
            </nav>
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
        
        <footer class="footer bg-dark rounded-t-lg py-10 px-4">
            <section class="lg:w-2/3 mx-auto">
                @if (isset($configuration['footer']))
                    <div class="mx-auto text-center py-6 content">
                        {!! prosemirrorToHtml($configuration['footer']) !!}
                    </div>
                @endif

                @if (isset($pages))
                    <div class="my-6">
                        <fieldset class="border-2 border-white rounded-lg">
                            <legend class="text-center">
                                <p class="text-3xl">Esplora</p>
                            </legend>

                            <div class="md:grid md:grid-cols-2 lg:grid-cols-4 px-4">
                                @foreach ($pages as $page)
                                    <a
                                        href="{{route('page', $page->slug)}}"
                                        class="capitalize md:inline md:text-left block text-center my-3"
                                    >
                                        {{ $page->name }}
                                    </a>
                                @endforeach
                            </div>
                            
                        </fieldset>
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

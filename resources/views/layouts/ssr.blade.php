<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" href="/favicon.ico">

    <!-- Meta Tags -->
    @include('components.head.meta')

    <!-- AMP -->
    @if (request()->hasAMPVersion)
        <link rel="amphtml" href="{{ url('/') }}/amp/{{ request()->path() }}">
    @endif

    <!-- Routes -->
    @routes

    <!-- RSS Feed -->
    @include('feed::links')

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    @include('components.head.disqus')
    @include('components.head.analytics')
</head>

<body class="font-sans antialiased bg-dark text-white banner">
    <div class="flex justify-end px-4 py-1 bg-dark">
        @auth
            <div>
                <span class="px-2">Ciao <strong>{{ auth()->user()->name }}</strong>! 👋</span>
                <a href="{{ route('profile.show') }}" class="px-2 uppercase text-primary underline">Profilo</a>
                <a href="{{ route('backpack.dashboard') }}" class="px-2 uppercase text-primary underline">Bacheca</a>
            </div>
        @endauth

        @guest
            <div class="grid grid-cols-2 gap-2 font-banner uppercase">
                <a href="{{ route('login') }}"
                    class="block text-sm text-center px-4 py-2 leading-none border rounded-full bg-primary border-none text-black lg:mt-0">Login</a>
                <a href="{{ route('register') }}"
                    class="block text-sm text-center text-white px-4 py-2 leading-none lg:mt-0">Registrati</a>
            </div>
        @endguest
    </div>

    <div class="sticky top-0 z-50">
        <nav class="top-0 left-0 right-0 px-4 bg-white text-dark shadow-lg">
            <div class="container mx-auto flex items-center justify-between flex-wrap">
                <div class="flex items-center flex-shrink-0 py-4 px-2">
                    <a href="{{ route('home') }}" class="text-2xl tracking-tight font-banner uppercase">
                        <span class="hidden lg:block">{{ $app['name'] }}</span>
                        <span class="lg:hidden block"><img class="h-10 w-10" src="/favicon.ico" /></span>
                    </a>
                </div>

                <div class="font-banner">
                    @include('components.dropdown', [
                        'mobileOnly' => true,
                        'label' => 'Sezioni',
                        'link' => '#',
                        'items' => [
                            [
                                'link' => 'https://mattia.codes',
                                'label' => 'ciao'
                            ],
                            [
                                'link' => 'https://mattia.codes',
                                'label' => 'coso con i sottomenu',
                                'items' => [
                                    ['link' => 'https://mattia.codes', 'label' => 'ciao']
                                ]
                            ]
                        ]
                    ])
                </div>

            </div>
        </nav>
    </div>

    <main class="font-sans antialiased text-white mx-auto my-6 rounded-lg shadow-lg">
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
                                <a href="{{ route('page', $page->slug) }}"
                                    class="capitalize md:inline md:text-left block text-center my-3">
                                    {{ $page->name }}
                                </a>
                            @endforeach
                        </div>

                    </fieldset>
                </div>
            @endif


            <div class="text-center">
                <div
                    class="my-5 py-5 mx-auto text-center text-black uppercase font-banner flex justify-center items-center gap-4">
                    <a href="https://www.instagram.com/siicomebill/" target="_blank" rel="noopener"
                        class="underline text-primary rounded-full flex justify-center items-center">
                        Instagram
                    </a>

                    <a href="https://www.facebook.com/siicomebill/" target="_blank" rel="noopener"
                        class="underline text-primary rounded-full flex justify-center items-center">
                        Facebook
                    </a>

                    <a href="https://www.github.com/siicomebill/" target="_blank" rel="noopener"
                        class="underline text-primary rounded-full flex justify-center items-center">
                        GitHub
                    </a>
                </div>

                <p class="py-10">
                    &copy; <strong>{{ config('app.name') }}</strong>
                    {{ date('Y') }}
                </p>

                <p>
                    Made with
                    <span class="font-handwritten text-primary text-4xl">LOVE</span> by
                    <a href="https://mattia.codes/" rel="noopener" target="_blank" class="emphasized">
                        Mattia Sinisi
                    </a>
                    and
                    <a href="https://www.linkedin.com/in/federica-spallino-5a7827114/" rel="noopener" target="_blank"
                        class="emphasized">
                        Federica Spallino
                    </a>
                </p>
            </div>
        </section>
    </footer>

    @include('components.head.bodyscripts')
</body>

</html>

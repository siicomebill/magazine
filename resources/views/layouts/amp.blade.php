<!DOCTYPE html>
<html ⚡ lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <link rel="icon" href="/favicon.ico">

    <!-- Meta Tags -->
    @include('components.head.meta')

    <!-- RSS Feed -->
    @include('feed::links')

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/picnic">

    <!-- AMP -->
    <script async src="https://cdn.ampproject.org/v0.js"></script>
    <style amp-boilerplate>
        body {
            -webkit-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -moz-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            -ms-animation: -amp-start 8s steps(1, end) 0s 1 normal both;
            animation: -amp-start 8s steps(1, end) 0s 1 normal both
        }

        @-webkit-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-moz-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-ms-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @-o-keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

        @keyframes -amp-start {
            from {
                visibility: hidden
            }

            to {
                visibility: visible
            }
        }

    </style>
    <noscript>
        <style amp-boilerplate>
            body {
                -webkit-animation: none;
                -moz-animation: none;
                -ms-animation: none;
                animation: none
            }

        </style>
    </noscript>
</head>

<body>
    <div style="overflow: hidden;height: 3em;">Non dovresti vedermi</div>
    <nav class="imponent">
        <a href="{{ route('home') }}" class="brand">
            <span>&lt;</span>
            <span>Home</span>
        </a>
    </nav>

    <main>
        @yield('page')
    </main>

    <footer>
        <section>
            @if (isset($pages))
                <div>
                    <fieldset>
                        <legend>
                            <p>Esplora</p>
                        </legend>

                        <ul>
                            @foreach ($pages as $page)
                                <li>
                                    <a href="{{ route('page', $page->slug) }}">
                                        {{ $page->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>

                    </fieldset>
                </div>
            @endif
        </section>
    </footer>
</body>

</html>

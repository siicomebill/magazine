<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
    </head>

    <body class="antialiased">
        <div class="banner text-white h-screen flex items-center">
			<div class="container mx-auto px-4">
				<fieldset class="bg-black shadow-xl text-center border border-white border-dashed rounded-full py-6">
					<legend class="my-auto font-banner capitalize text-6xl bg-black border border-white border-dashed rounded-full px-6 py-2">
						@yield('code')
                    </legend>
                    <p class="text-xl">
                        @yield('message')
                    </p>
				</fieldset>
			</div>
        </div>
    </body>
</html>

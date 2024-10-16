<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'League of Branly')</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    <!-- Prism.js -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/themes/prism-tomorrow.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/prism-core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/plugins/autoloader/prism-autoloader.min.js"></script>

    <script>
        Prism.plugins.autoloader.languages_path = 'https://cdnjs.cloudflare.com/ajax/libs/prism/1.24.1/components/';
    </script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Bold.ttf") }}') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-BoldItalic.ttf") }}') format('truetype');
            font-weight: bold;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Heavy.ttf") }}') format('truetype');
            font-weight: 900;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-HeavyItalic.ttf") }}') format('truetype');
            font-weight: 900;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Italic.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Light.ttf") }}') format('truetype');
            font-weight: 300;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-LightItalic.ttf") }}') format('truetype');
            font-weight: 300;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Medium.ttf") }}') format('truetype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-MediumItalic.ttf") }}') format('truetype');
            font-weight: 500;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Regular.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'BeaufortforLOL';
            src: url('{{ asset("fonts/BeaufortforLOL-Italic.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: italic;
            font-display: swap;
        }

        @font-face {
            font-family: 'Spiegel';
            src: url('{{ asset("fonts/Spiegel-Regular.ttf") }}') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Spiegel';
            src: url('{{ asset("fonts/Spiegel-Bold.ttf") }}') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }
    </style>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('css/prism.css') }}" rel="stylesheet">
    <link href="{{ asset('css/table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/form.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div id="app">
        <x-navbar />

        <main class="medium-body">
            @yield('content')
        </main>

        <footer class="mt-auto py-3">
            <div class="container text-center text-grey-2">
                <p>&copy; {{ date('Y') }} League of Branly. All content and assets of this website are the property of League of Legends and RIOT GAMES.</p>
                <p>This website exist as an exercise for the student of BTS CIEL in Lycée Polyvalent Edouard Branly, LYON, FRANCE.</p>
            </div>
        </footer>
    </div>
</body>

</html>
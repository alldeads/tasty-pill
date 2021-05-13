<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Tasty Pill') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dropzone.min.js') }}"></script>
    <script src="{{ asset('js/html2canvas.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.min.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Montserrat';
        }

        #bodyBorder {
            border-style: dashed; 
            border-color: #667093;
            border-radius: 5px;
            border-width: 3px;
        }

        #previewFile {
            border-style: dashed; 
            border-color: #667093;
            border-radius: 5px;
            border-width: 3px;
        }

        #errorContainer {
            background-color: #E6BABC;
            border-style: dashed; 
            border-color: #BC2023;
            border-radius: 5px;
            border-width: 3px;
            opacity: 1;
        }
    </style>
    
    @yield('styles')

    @livewireStyles
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white p-4">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="./images/logo.jpeg" width="200">
                </a>
            </div>
        </nav>

        <main>
            @yield('content')
        </main>
    </div>
    @livewireScripts

    @yield('scripts')
</body>
</html>

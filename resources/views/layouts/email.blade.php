<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/mytheme.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('css/general_foundicons.css') }}" rel="stylesheet">
</head>
<body>
    <main class="pt-4 text-dark">
        @yield('content')
    </main>
    
    <footer class="container py-3">
        <div class="text-right text-light">&copy; Vintage Treasures 2020</div>
    </footer>
</body>


</html>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
</head>
<body>
    <style>
        body {
            background-color: #DDD;
        }
        h1 {
            color: #9573FF;
        }
        .container {
            margin: 25px;
        }
        p {
            color: #9573FF;

        }
        .footer {
            color: #BBB;
            text-align: right;
        }
    </style>
    <main>
        @yield('content')
    </main>
    
    <footer">
        <div class="footer">&copy; Vintage Treasures 2020</div>
    </footer>
</body>


</html>

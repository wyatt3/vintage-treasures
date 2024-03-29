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
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item px-2">
                            <a class="nav-link" href="{{ route('products.index') }}">Shop<a>
                        </li>
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{ route('shoppingCart') }}"><i class="foundicon-cart"></i>&nbsp;&nbsp;Shopping Cart <span class="cartAmt"><?php if($cart) { echo "(" . count($cart) . ")";} ?></span></a>
                            </li>
                        @endguest
                    </ul>
            </div>
        </nav>
        <div class="pt-5 pb-4"></div>
        <main class="py-4 text-dark">
            @yield('content')
        </main>
        <footer class="container mb-3">
        <div class="float-left"><a class="text-light" href="{{ route('login') }}">Login</a></div>
        <div class="text-right text-light">&copy; Vintage Treasures 2020</div>
        </footer>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <!-- Custom Scripts -->
    <script src="{{ asset('js/jquery.validate.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/shop.js') }}"></script>
    <script>
        var cartIcon = "<i class='foundicon-cart'></i>"
        cartInit(<?php echo $JScart ?>);
    </script>
</body>
</html>

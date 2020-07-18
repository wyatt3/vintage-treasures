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


    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="{{ asset('js/jquery.validate.js') }}"></script>

<!-- Custom Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item px-2">
                                <a class="nav-link" href="" data-toggle="modal" data-target="#quoteModal"><i class="foundicon-mail"></i>&nbsp;&nbsp;Get A Quote</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="tel:+14353749436"><i class="foundicon-phone"></i>&nbsp;&nbsp;Call Now</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="https://www.google.com/maps/dir//Vintage+Treasures/data=!4m8!4m7!1m0!1m5!1m1!1s0x87547e3fc16366a3:0xca9f875ddf2fdffa!2m2!1d-111.83540939999999!2d41.7321281" target="_blank"><i class="foundicon-location"></i>&nbsp;&nbsp;Get Directions</a>
                            </li>
                            <li class="nav-item px-2">
                                <a class="nav-link" href="{{ route('products.index') }}"><i class="foundicon-cart"></i>&nbsp;&nbsp;Featured Items</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right bg-primary" aria-labelledby="navbarDropdown">
                                    <a class="nav-link text-light pl-3" href="{{ route('voyager.dashboard') }}">Manage</a>
                                    <a class="nav-link text-light pl-3" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4 text-dark">
            @yield('content')
        </main>
        @if(Request::is('/'))
        <div class="bg-overlay">
            <footer class="container py-3">
                <div class="float-left"><a class="text-gray" href="{{ route('login') }}">Login</a></div>
                <div class="text-right text-gray">&copy; Vintage Treasures 2020</div>
            </footer>
        </div>
        @else        
        <footer class="container py-3">
            <div class="float-left"><a class="text-light" href="{{ route('login') }}">Login</a></div>
            <div class="text-right text-light">&copy; Vintage Treasures 2020</div>
        </footer>
        @endif
    </div>
</body>


</html>

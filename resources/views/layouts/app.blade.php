<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" 
    rel="stylesheet">

    <!-- cooper-black-std/june-expt-variable -->
    <link rel="stylesheet" href="https://use.typekit.net/
    uoa6tpn.css">
                                                               
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css2?
    family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!--************ Scripts ************-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 
    'resources/css/app.css'])

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!--************ Icone ************-->
    <script src="https://kit.fontawesome.com/1dd6859436.js"
    crossorigin="anonymous"></script>

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <li>
                        <a class="navbar-brand" href="{{route ('campagnes.index')}}">
                            Promotions
                        </a>
                        </li>
                        @if (Auth::user())
                        <li>
                        <a class="navbar-brand" href="{{ route('favoris.index') }}">
                            Favoris
                        </a>
                        </li>    
                        @endif
                        @if (Auth::user())
                        <li>
                        <a class="navbar-brand" href="{{ route('commandes.index') }}">
                            Commandes
                        </a>
                        </li>    
                        @endif
                        
                        <li>
                            <a class="navbar-brand" href="{{ route('admin') }}">
                                Back-office
                            </a>
                        </li>    
                        
                    </ul>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid text-center">
                @if (session()->has('message'))
                    <p class="alert alert-success"> {{ session()->get('message') }} </p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li> {{ $error }} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>



            @yield('content')
        </main>
    </div>
</body>
</html>

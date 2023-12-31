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
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- cooper-black-std/june-expt-variable -->
    <link rel="stylesheet" href="https://use.typekit.net/
    uoa6tpn.css">

    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css2?
    family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!--************ Fonts ******************-->
    <!-- cooper-black-std/june-expt-variable -->
    <link rel="stylesheet" href="https://use.typekit.net/uoa6tpn.css">
    <!-- Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <!--************ Scripts ************-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js', 'resources/css/app.css'])

    <!--************ Icone ************-->
    <script src="https://kit.fontawesome.com/1dd6859436.js" crossorigin="anonymous"></script>

    <link rel="favicon" type="kahwas/public/favicon.png" href="./" />

</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-warning shadow-sm fixed-top">
            <div class="container">
                <a class="navbar-brand" href="home#">
                    <img class="w-25" src="{{ asset('images/kahwas_logo.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- Right Side Of Navbar -->

                    <!-------------------------------- liens accessibles à tous --------------------------------->

                    <!-- Lien produits les mieux notés -->

                    <div class="row navbar-nav ms-auto">

                        <div class="col-md-2">
                            <a class="nav-link active"
                                href="{{ route('toparticles') }}">{{ __('Top articles') }}</a>
                        </div>

                        <div class="col-md-2">
                            <a class="nav-link active" aria-current="articles"
                                href="{{ route('articles.index') }}">Catalogue</a>
                        </div>

                        <div class="col-md-2">
                            <a class="nav-link active" aria-current="gammes"
                                href="{{ route('gammes.index') }}">Gammes</a>
                        </div>

                        <div class="col-md-2">
                            <a class="nav-link active" aria-current="gammes"
                                href="{{ route('campagnes.index') }}">Promotions</a>
                        </div>

                        <div class="col-md-2">
                            <a class="nav-link active" aria-current="panier"
                                href="{{ route('panier.show') }}">Panier</a>
                        </div>


                        {{-- <!-------------------------------- liens accessibles aux invités uniquement ---------------------------------> --}}

                        @guest
                            <div class="col-md-2 d-flex nav-item">
                                @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                @endif
                                @if (Route::has('register'))
                                    <a class="nav-link ps-2" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                @endif
                            </div>

                            <!-------------------------------- liens accessibles aux connectés uniquement --------------------------------->
                        @else
                            <div class="col">

                                    <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->pseudo }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">

                                        <!-- Lien vers "MON COMPTE" -->
                                        <a class="dropdown-item" href="{{ route('user.edit', $user = Auth::user()) }}">Mon
                                            compte</a>


                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>

                                        @if (Auth::user()->role_id == 2)
                                            <a class="dropdown-item" href="{{ route('admin') }}">
                                                Back-office
                                            </a>
                                        @endif

                                        <!-------------------------------- favoris : uniquement si connecté --------------------------------->

                                        <a class="dropdown-item" aria-current="panier"
                                            href="{{ route('favoris.index') }}">Favoris</a>
                                        <a class="dropdown-item" aria-current="commande"
                                            href="{{ route('commandes.index') }}">Commandes</a>

                                        <!-- Lien vers "DECONNEXION" -->
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                            {{ __('Déconnexion') }}
                                        </a>
                                    </div>
                                </li>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </nav>

            <div class="container-fluid text-center mt-5">
                @if (session()->has('message'))
                    <p class="alert alert-success">{{ session()->get('message') }}</p>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            <main>
                @yield('content')
            </main>
        </div>
    </body>
    <footer class="bg-warning p-5 mx-auto">
        <div class="row mx-auto text-center">
            <div class="col">
                <div class="row mr-2 ml-2">
                    <div class="col">
                        <ul class="text-light">
                            <li class="li_bold"><b>Nous découvrir</b></li>
                            <li>Qui Sommes nous ?</li>
                            <li>Les marques Kahwas</li>
                            <li>Index de l'égalité professionnelle</li>
                            <li>Notre charte qualité</li>
                            <li>Espace Presse</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="text-light">
                            <li class="li_bold"><b>Aide & Services</b></li>
                            <li>Questions fréquentes</li>
                            <li>Livraison</li>
                            <li>Suivi de commande</li>
                            <li>Mot de passe perdu</li>
                            <li>SAV par marque</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul class="text-light">
                            <li class="li_bold"><b>Informations légales</b></li>
                            <li>Gérer les cookies</li>
                            <li>Protection des données</li>
                            <li>Conditions générales de vente</li>
                            <li>Notre charte qualité</li>
                            <li>Mentions légales</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="text-center mx-auto pt-4">
                <a class="navbar-brand" href="home#">
                    <img class="logo_footer  text-center" src="{{ asset('images/kahwas_logo_light.png') }}"
                        alt="Logo">
                </a>
                <p class="presentation text-light pt-4">Découvrez notre boutique en ligne dédiée aux amateurs de café :
                    une sélection exceptionnelle de machines à café et de grains fraîchement torréfiés pour une
                    expérience
                    caféinée
                    inégalée !
                </p>
            </div>
        </div>
        <h5 class="pt-4 text-light mx-auto text-center">© 2006 - 2023 - <b>Reproduction interdite</h5>
    </footer>

    </html>

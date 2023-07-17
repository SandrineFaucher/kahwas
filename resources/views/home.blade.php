@extends('layout.app')

@section('content')
    <header>
        <div class="base_line">
            <h1 class="base_line_h1 text-center">Kahwas shop</h1>
            <h2 class="text-center pb-5">vous propose des machines d'exception pour une expérience caféinée
                inégalée!</h2>
        </div>
    </header>

    <body>
        {{-- carrousel --}}
        <div id="carouselExample" class="carousel slide">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/4_carousel_sage.png') }}" class="d-block w-100" alt="sage">
                </div>
                <div class="carousel-item active">
                    <img src="{{ asset('images/3_carousel_ascaso.png') }}" class="d-block w-100" alt="ascaso">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/2_carousel_marzocco.png') }}" class="d-block w-100" alt="siemens">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/1_carousel_delonghi.png') }}" class="d-block w-100" alt="delonghi">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev"><svg
                    id="i-caret-left" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"
                    fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M22 30 L6 16 22 2 Z" />
                </svg>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next"><svg
                    id="i-caret-right" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" width="32" height="32"
                    fill="none" stroke="currentcolor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2">
                    <path d="M10 30 L26 16 10 2 Z" />
                </svg>
                <span class="visually-hidden">Next</span>
            </button>

            {{-- bouton scroll --}}
            <div class="scroll">
                <script src="https://cdn.lordicon.com/bhenfmcm.js"></script>
                <lord-icon src="https://cdn.lordicon.com/xwjtkymn.json" trigger="loop"
                    colors="primary:#d6af8e,secondary:#d6af8e" style="width:75px;height:75px">
                </lord-icon>
            </div>

        </div>



        {{-- promos --}}

        <div class="rounded-5 pb-5 rounded-top-0">
            <div class="font_promo text-center mx-auto p-5">
                <h2 class="home_title mx-auto text-center">{{ $promoActuelle->nom }}</h2>
                <div class="p-3">
                    <h3>{{ $promoActuelle->reduction }} % sur une selection d'articles du {{ $promoActuelle->date_debut }}
                        au {{ $promoActuelle->date_fin }}</h3>
                </div>
            </div>
            <div class="containter pt-3">
                <div class="row w-75 mx-auto">
                    @foreach ($promoActuelle->articles as $article)
                        <div class="col-md-4">
                            <div class="card_promo card p-3 mb-5 rounded-4">
                                <img class="rounded-1" src="{{ asset('images/' . $article->image) }}"
                                    alt="Image de l'article">

                                <div class="card-body">
                                    <h3 class="card-title text-center mb-3">{{ $article->nom }}</h3>
                                    <div class="row">
                                        <div class="col-md-9">
                                            <p class="card-text">{{ $article->description }}</p>
                                        </div>
                                        <div class="style_prix col text-center">
                                            <p class=" text-decoration-line-through">{{ $article->prix }} €</p>
                                            @php
                                                $prixremise = $article->prix - ($article->prix * $promoActuelle->reduction) / 100; //remise sur article promo
                                            @endphp
                                            <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }} €</p>
                                        </div>

                                        <div class="row text-center">
                                            <form method="POST" action="{{ route('panier.add', $article) }}"
                                                class="form-inline d-inline-block">
                                                @csrf
                                                <input value="1" type="number" name="quantite" placeholder="Quantité"
                                                    class="form-control m-1">
                                                <div class="col ml-5">
                                                    <button type="submit" class="btn btn-warning m-1">Ajouter au
                                                        panier</button>
                                                </div>
                                            </form>
                                            <div class="col ml-5">
                                                <a href="{{ route('articles.show', $article) }}">
                                                    <button class="btn validerCommande">Détails produit</button>
                                                </a>
                                            </div>
                                            @if (Auth::user())
                                                <!-- si le produit est déjà dans les favoris-->
                                                @if (Auth::user()->isInFavorites($article))
                                                    <!-- si dans les favoris-->
                                                    <form method="post"
                                                        action="{{ route('favoris.destroy', $article->id) }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-outline-danger m-2">Retirer
                                                            des
                                                            favoris</button>

                                                    </form>
                                                @else
                                                    <!-- si le produit n'est pas dans les favoris-->
                                                    <form method="post" action="{{ route('favoris.store') }}">
                                                        @csrf
                                                        <input type="hidden" value="{{ $article->id }}"
                                                            name="articleId">
                                                        <button type="submit"
                                                            class="btn btn-outline-secondary m-2">Ajouter aux
                                                            favoris</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="row">
                    <div class="col-12 text-center">
                        <a href="register"><button class="btn btn-lg px-5 btn-success rounded-pill">Voir toutes
                                les promotions</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">

            {{-- Produits les mieux notés --}}

            <h2 class="home_title p-5 mx-auto text-center">Produits les mieux notés</h2>

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="card_note card p-3 mb-5 rounded-4">
                            <img class="image_note rounded-1" src="{{ asset('images/' . $article->image) }}"
                                alt="Image de l'article">
                            <p class="btn btn-light position-absolute buttom rounded-pill m-2">
                                {{ $article->note }} <i class="star fa-solid fa-star" style="color: #fec700;"></i>
                            </p>
                            <div class="card-body">
                                <h3 class="card-title text-center mb-3">{{ $article->nom }}</h3>
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="card-text">{{ $article->description }}</p>
                                    </div>
                                    <div class="style_prix col">

                                        @php
                                            $campaign = getCampaign($article->id);
                                        @endphp

                                        @if ($campaign)
                                            {{-- //==true --}}

                                            <p class="text-decoration-line-through">{{ $article->prix }} €</p>
                                            @php
                                                $prixremise = $article->prix - ($article->prix * $promoActuelle->reduction) / 100;
                                            @endphp
                                            {{-- //remise sur article promo --}}
                                            <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }} €</p>
                                        @else
                                            <p>{{ $article->prix }} €</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row text-center">
                                <form method="POST" action="{{ route('panier.add', $article) }}"
                                    class="form-inline d-inline-block">
                                    @csrf
                                    <input value="1" type="number" name="quantite" placeholder="Quantité"
                                        class="form-control m-1">
                                    <div class="col ml-5">
                                        <button type="submit" class="btn btn-warning m-1">Ajouter au
                                            panier</button>
                                    </div>
                                </form>
                                <div class="col ml-5">
                                    <a href="{{ route('articles.show', $article) }}">
                                        <button class="btn validerCommande">Détails produit</button>
                                    </a>
                                </div>
                                @if (Auth::user())
                                    <!-- si le produit est déjà dans les favoris-->
                                    @if (Auth::user()->isInFavorites($article))
                                        <!-- si dans les favoris-->
                                        <form method="post" action="{{ route('favoris.destroy', $article->id) }}">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-outline-danger m-2">Retirer des
                                                favoris</button>

                                        </form>
                                    @else
                                        <!-- si le produit n'est pas dans les favoris-->
                                        <form method="post" action="{{ route('favoris.store') }}">
                                            @csrf
                                            <input type="hidden" value="{{ $article->id }}" name="articleId">
                                            <button type="submit" class="btn btn-outline-secondary m-2">Ajouter aux
                                                favoris</button>
                                        </form>
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


        </div>
    </body>
@endsection

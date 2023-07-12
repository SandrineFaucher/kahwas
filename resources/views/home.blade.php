@extends('layouts.app')

@section('content')

    <body>
        {{-- carrousel --}}

        <div id="carouselExample" class="carousel slide pt-5">
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
                                        <div class="col text-center">
                                            <p class="text-decoration-line-through">{{ $article->prix }} €</p>
                                            @php
                                                $prixremise = $article->prix - ($article->prix * $promoActuelle->reduction) / 100; //remise sur article promo
                                            @endphp
                                            <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }} €</p>
                                        </div>
                                        {{-- Ajout pannier --}}
                                        {{-- <form method="POST" action="{{ route('panier.add', 1) }}"
                                            class="form-inline d-inline-block">
                                            {{ csrf_field() }}
                                            <input type="number" name="quantite" placeholder="Quantité ?"
                                                class="form-control mr-2">
                                            {{-- value="{{ isset(session('panier')[$article->id]) ? session('panier')[$article->id]['quantite'] : null }}"> --}}
                                        {{-- <!-- value = afficher la quantité du produit s'il se trouve au panier--> --}}

                                        <!-- <button type="submit" class="ajoutPanier btn">+ Ajouter au panier</button>
                                                                                    </form>-->
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
                            <div class="card-body">

                                <p class="btn btn-light position-absolute top-50 rounded-pill">
                                    {{ $article->note }} <i class="star fa-solid fa-star" style="color: #fec700;"></i>
                                </p>

                                <h3 class="card-title text-center mb-3">{{ $article->nom }}</h3>
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="card-text">{{ $article->description }}</p>
                                    </div>
                                    <div class="col">

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
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </body>
@endsection

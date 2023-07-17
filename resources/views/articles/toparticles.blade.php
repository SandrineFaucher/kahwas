@extends('layout.app')

@section('title')
    Top articles
@endsection

@section('content')
    <!-- SECTION ARTICLES LES MIEUX NOTEES
                        ============================================================== -->
    <div class="container-fluid pt-3" id="section_top_articles">

        <!-- titre section -->
        <h1 class="page_title_campagne text-center">Les articles les mieux notés</h1>

        <div class="row justify-content-center">
            <div class="row mt-4">

                <!-- BOUCLE ARRTICLES LES MIEUX NOTEES
                                    ============================================================== -->
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


                                            @php $campagne = GetCampaign($article->id) @endphp
                                            @if ($campagne)
                                                <div class="text-center d-flex justify-content-between">
                                                    <p class="text-decoration-line-through text-danger m-0"
                                                        style="font-weight: bold;">
                                                        {{ $article->prix }}€</p>
                                                    @php
                                                        $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                                                    @endphp
                                                    <p class="m-0" style="font-weight: bold">
                                                        {{ number_format($prixremise, 2, ',', ' ') }}€</p>
                                                </div>
                                            @else
                                                <p class="m-0" style="font-weight: bold">{{ $article->prix }}€</p>
                                            @endif





                                        </div>
                                    </div>
                                </div>
                                <!-- boutton ajout au panier -->
                                <div class="container text-center">
                                    <div class="row text-center mt-1">
                                        <div class="col-md-12">
                                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                                class="form-inline d-inline-block">
                                                {{ csrf_field() }}

                                                <input value="1" type="number" name="quantite"
                                                    placeholder="Quantité ?" class="form-control mr-2">
                                            </form>
                                        </div>

                                        <div class="col-md-12">
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
                                                        <input type="hidden" value="{{ $article->id }}" name="articleId">
                                                        <button type="submit" class="btn btn-outline-secondary m-2">Ajouter
                                                            aux
                                                            favoris</button>
                                                    </form>
                                                @endif
                                            @endif
                                        </div>

                                        <div class="col">

                                            <form method="POST" action="{{ route('panier.add', 1) }}"
                                                class="form-inline d-inline-block">
                                                {{ csrf_field() }}

                                                <button type="submit" class="ajoutValider btn">Ajouter au panier</button>

                                            </form>

                                        </div>

                                        <div class="col">
                                            <a href="{{ route('articles.show', $article) }}" class="m-1">
                                                <button class="btn btn-dark validerCommande">Détails produit</button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

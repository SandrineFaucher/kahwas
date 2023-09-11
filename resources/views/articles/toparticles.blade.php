@extends('layout.app')

@section('title')
    Top articles
@endsection

@section('content')
    <!-- SECTION ARTICLES LES MIEUX NOTEES
            ============================================================== -->
    <div class="container-fluid pt-3" id="section_top_articles">

        <!-- titre section -->
        <h1 class="text-center p-5 mt-5 fs-2 px-5 border border-secondary rounded">Les articles les mieux
                notés</h1>


        <div class="row justify-content-center">
            <div class="row mt-4">

                        <!-- BOUCLE ARRTICLES LES MIEUX NOTEES
                        ============================================================== -->
                @foreach ($articles as $article)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card mt-3 p-1" id="card_top_artciles">


                                    <!-- CARD HEADER
                                    ============================================================== -->
                            <div class="card-header">

                                @php $campagne = GetCampaign($article->id) @endphp
                                @if ($campagne)
                                    <div class="text-center d-flex justify-content-between">
                                        <p class="text-decoration-line-through text-danger m-0" style="font-weight: bold;">
                                            {{ $article->prix }}€</p>
                                        @php
                                            $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                                        @endphp
                                        <p class="m-0 text-white" style="font-weight: bold">
                                            {{ number_format($prixremise, 2, ',', ' ') }}€</p>
                                    </div>
                                @else
                                    <p class="m-0 text-white" style="font-weight: bold">{{ $article->prix }}€</p>
                                @endif


                            </div>
                            <!-- image -->
                            <img src="{{ asset('images/' . $article->image) }}" class="rounded-top"
                                alt="{{ $article->nom }}">


                            <!-- note -->
                            <p class="text-dark position-absolute mt-5 rounded" id="second_paragraphe"><span
                                    class="p-1">{{ $article->note }}/5</span></p>

                            <!-- nom + description -->
                            <div class="card-body">
                                <div>

                                    <!-- nom -->
                                    <p class="card-text fw-bold fs-5 text-center border-bottom rounded">{{ $article->nom }}
                                    </p>
                                    <!-- description -->
                                    <p class="card-text">{{ $article->description }}</p>

                                </div>
                            </div>


                            <!-- Bouton “AJOUT AU PANIER“ + “DETAILS PRODUIT“ -->
                            <div class="card-footer border-top rounded d-flex justify-content-between gap-2">

                                <!-- boutton ajout au panier -->
                                <div class="row text-center">
                                    <form method="POST" action="{{ route('panier.add', $article) }}"
                                        class="form-inline d-inline-block">
                                        @csrf
                                        <input value="1" type="number" name="quantite" placeholder="Quantité"
                                            class="form-control m-1">
                                        <div class="col ml-5">
                                            <button type="submit" class="btn btn-warning m-1">Ajouter au
                                                panier
                                            </button>
                                        </div>
                                    </form>
                                    <div class="col">
                                        <a href="{{ route('articles.show', $article) }}" class="m-1">
                                            <button class="btn btn-dark validerCommande">Détails produit</button>
                                        </a>
                                        @if (Auth::user())
                                            <!-- si le produit est déjà dans les favoris-->
                                            @if (Auth::user()->isInFavorites($article))
                                                <!-- si dans les favoris-->
                                                <form method="post" action="{{ route('favoris.destroy', $article->id) }}">
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
                                                    <button type="submit" class="btn btn-outline-secondary m-2">Ajouter aux
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

        </div>
    </div>
@endsection

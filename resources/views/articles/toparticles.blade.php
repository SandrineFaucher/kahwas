@extends('layout.app')

@section('title')
    Top articles
@endsection

@section('content')


    <!-- SECTION ARTICLES LES MIEUX NOTEES
    ============================================================== -->
    <div class="container-fluid pt-3" id="section_top_articles">

        <!-- titre section -->
        <h1 class="text-center p-0 fs-1"><span class="px-5 border border-secondary rounded">Les articles les mieux notés</span></h1>


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

                                @php $campagne = GetCampagne($article->id) @endphp
                                @if ($campagne)

                                    <div class="text-center d-flex justify-content-between">
                                        <p class="text-decoration-line-through text-danger m-0" style="font-weight: bold;">{{ $article->prix }}€</p>
                                        @php
                                            $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                                        @endphp
                                        <p class="m-0" style="font-weight: bold">{{ number_format($prixremise, 2, ',', ' ') }}€</p>
                                    </div>
                                @else
                                    <p class="m-0" style="font-weight: bold">{{ $article->prix }}€</p>
                                @endif


                            </div>
                            <!-- image -->
                            <img src="{{ asset('images/' . $article->image) }}" class="rounded-top" alt="{{ $article->nom }}">
                            
                        
                            <!-- note -->
                            <p class="text-dark position-absolute mt-5 rounded" id="second_paragraphe"><span class="p-1">{{ $article->note }}/5</span></p>

                            <!-- nom + description -->
                            <div class="card-body">
                                <div>

                                    <!-- nom -->
                                    <p class="card-text fw-bold fs-5 text-center border-bottom rounded">{{ $article->nom }}</p>
                                    <!-- description -->
                                    <p class="card-text">{{ $article->description }}</p>

                                </div>
                            </div>


                            <!-- Bouton “AJOUT AU PANIER“ + “DETAILS PRODUIT“ -->
                            <div class="card-footer border-top rounded d-flex justify-content-between gap-2">

                                <!-- boutton ajout au panier -->
                                <form method="POST" action="{{ route('panier.add', 1) }}" class="form-inline d-inline-block">
                                {{ csrf_field() }}

                                    <input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2">
                                    <button type="submit" class="ajoutValider btn">+ Ajouter au panier</button>

                                </form>

                                <!-- boutton détails produit -->
                                <a href="{{ route('articles.show', $article) }}">
                                    <button class="btn btn-outline-secondary validerCommande">Détails produit</button>
                                </a>

                            </div>

    
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </div>


@endsection

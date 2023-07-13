@extends('layout.app')

@section('title')
    Top articles
@endsection

@section('content')


    <!-- SECTION ARTICLES LES MIEUX NOTEES
    ============================================================== -->
    <div class="container-fluid pt-3" id="section_top_articles">

        <!-- titre section -->
        <h1 class="text-center p-0 "><span class="px-5 border border-secondary rounded">Les articles les mieux notés</span></h1>


        <div class="row justify-content-center">
            <div class="row mt-4">

                <!-- BOUCLE ARRTICLES LES MIEUX NOTEES 
                ============================================================== -->
                @foreach ($articles as $article)

                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card mt-3 p-1" id="card_top_artciles">

                            <!-- image -->
                            <img src="{{ asset('images/' . $article->image) }}" class="rounded-top" alt="{{ $article->nom }}">
                            <!-- prix -->
                            <p class="text-light fs-5 position-absolute mt-2 ms-1" id="first_paragraphe"><span class="border border-secondary rounded p-1">{{ $article->prix }} €</span></p>
                            <!-- note -->
                            <p class="text-dark position-absolute mt-2" id="second_paragraphe"><span class="border border-secondary rounded p-1">{{ $article->note }}/5</span></p>

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
                                 <button type="button mx-auto" class="btn btn-outline-secondary" style="box-shadow: 0.5px 1px 4px black">Ajouter au panier</button>
                                 <button type="button mx-auto" class="btn btn-outline-secondary" style="box-shadow: 0.5px 1px 4px black">Détails produit</button>
                             </div>

    
                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </div>


@endsection

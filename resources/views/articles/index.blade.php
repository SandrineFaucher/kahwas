@extends('layouts.app')

@section('title')
    Modifier article
@endsection


<h1 class="page_title_catalogue text-center mx-auto">Catalogue</h1>




{{-- * * * Titre * * * --}}

<div class="row w-75 mx-auto pt-5">
    @foreach ($articles as $article)
        <div class="col-md-4">
            <div class="card_promo card p-3 mb-5 rounded-4">
                <img class="rounded-1" src="{{ asset('images/' . $article->image) }}">
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
                <form {{-- method="POST" action="{{ route('panier.add', 1) }}" --}} class="form-inline d-inline-block m-3">
                    {{ csrf_field() }}
                    <input type="number" name="quantite" placeholder="Quantité ?" class="form-control mr-2">
                    {{ isset(session('panier')[$article->id]) ? session('panier')[$article->id]['quantite'] : null }}
                    <!-- value = afficher la quantité du produit s'il se trouve au panier-->
                </form>
                <div class="row text-center">
                    <div class="col">
                        <button type="submit" class="ajoutPanier btn btn-danger">Ajouter au
                            panier</button>
                    </div>
                    <div class="col">
                        <a href="{{ route('articles.show', $article) }}" class="m-1">
                            <button class="btn btn-dark validerCommande">Détails produit</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

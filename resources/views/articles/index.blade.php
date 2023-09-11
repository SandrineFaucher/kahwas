@extends('layout.app')

@section('title')
    Kahwas - Catalogue
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
    @endforeach
</div>

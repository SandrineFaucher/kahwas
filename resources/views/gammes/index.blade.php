@extends('layout.app')

@section('title')
    Gammes - kahwas
@endsection

@section('content')
    <h1 class="page_title text-center mx-auto">Gammes</h1>
    <div class="btn-group dropup">
        <button class="rounded-pill droptdown_gamme btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Choisissez une gamme
        </button>
        <ul class="dropdown-menu">
            @foreach ($gammes as $gamme)
                <li class="dropdown-item"><a class="dropdown-item p-1" href="#{{ $gamme->nom }}">{{ $gamme->nom }}</a></li>
            @endforeach
        </ul>
    </div>




    {{-- * * * Titre * * * --}}


    @foreach ($gammes as $gamme)
        <h2 id="{{ $gamme->nom }}" class="title_gamme text-center mx-auto">{{ $gamme->nom }}</h2>

        <div class="row w-75 mx-auto">
            @foreach ($gamme->articles as $article)
                <div class="col-md-4">
                    <div class="card_promo card p-3 mb-5 rounded-4">
                        <img class="rounded-1" src="{{ asset('images/' . $article->image) }}">

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

                                {{-- </form> --}}
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

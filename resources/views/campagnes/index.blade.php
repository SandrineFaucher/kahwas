@extends('layouts.app')

@section('content')
    <h1 class="text-center">Promotions </h1>

    @foreach ($campagnes as $campagne)
        <div class="container-fluid text-center mt-5">

            <h2 class="card-title mt-4">
                {{ $campagne->nom }}
            </h2>

            <h5 class="mt-4">du {{ date('d/m', strtotime($campagne->date_debut)) }}
                au
                {{ date('d/m/y', strtotime($campagne->date_fin)) }}
            </h5>

            <h4 class="reduction mt-4 text-danger">
                {{ $campagne->reduction }}% sur tous ces produits
            </h4>
            <div class="container-fluid d-flexjustify-content-center ">
                <div class="row text-center mt-5 ">
                    @foreach ($campagne->articles as $article)
                        <div class="col-md-3  text-center">
                            <div class="card p-2 border rounded">

                                <img class="rounded-1" src="{{ asset('images/' . $article->image) }}" alt="article-image">


                                <div>
                                    <h5 class="card-title m-3">{{ $article->nom }}</h5>
                                    <p class="card-text m-3">{{ $article->description }}</p>
                                </div>

                                <p class="text-danger">{{ $campagne->reduction }}%</p>

                                <div class="text-center d-flex justify-content-evenly">
                                    <p class="text-decoration-line-through">{{ $article->prix }}€</p>
                                    @php
                                        $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                                    @endphp
                                    <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }}€</p>
                                </div>

                                <div class="card-body ">
                                    <a href="#" class="card-link">
                                        <button type="button" class="btn btn-warning">
                                            Détail de l'article
                                        </button>
                                    </a>

                                    <!-- si l'utilisateur est connecté (sinon, pas de gestion des favoris)-->
                                    @if (Auth::user())
                                        <!-- si le produit est déjà dans les favoris-->
                                        @if (Auth::user()->isInFavorites($article))
                                            <!-- si dans les favoris-->
                                            <form method="post" action="{{ route('favoris.destroy', $article->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger m-2">Retirer des
                                                    favoris</button>

                                            </form>
                                        @else
                                            <!-- si le produit n'est pas dans les favoris-->
                                            <form method="post" action="{{ route('favoris.store') }}">
                                                @csrf
                                                <input type="hidden" value="{{ $article->id }}" name="articleId">
                                                <button type="submit" class="btn btn-success m-2">Ajouter aux
                                                    favoris</button>
                                            </form>
                                        @endif
                                    @endif


                                    <form method="POST" action="{{ route('panier.add', $article) }}"
                                        class="form-inline d-inline-block">
                                        @csrf
                                        <input type="number" name="quantite" placeholder="Quantité"
                                            class="form-control m-1">
                                        <button type="submit" class="btn btn-success">+ Ajouter au panier</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection

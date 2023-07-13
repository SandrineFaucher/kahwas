@extends('layout.app')

@section('content')

<!--TITRE PAGE-->
<h1 class="text-center p-0 "><span class="px-5 border border-secondary rounded">Campagnes en cours</span></h1>

    <!--BOUCLE QUI AFFICHE LES CAMPAGNES-->
    @foreach ($campagnes as $campagne)
        <div class="container-fluid text-center mt-5">

            <!--NOM-->
            <h2 class="card-title mt-4 ">
                <span class="fs-2">{{ $campagne->nom }}</span>
            </h2>

            <!--DATES-->
            <h5 class="mt-4">du {{ date('d/m', strtotime($campagne->date_debut)) }}
                au
                {{ date('d/m/y', strtotime($campagne->date_fin)) }}
            </h5>

            <!--POURCENTAGE DE REDUCTION-->
            <h4 class="reduction mt-4 text-danger">
                {{ $campagne->reduction }}% sur tous ces produits
            </h4>

            <!--BOUCLE QUI AFFICHE LES ARTICES DANS LA REDUCTION-->
            <div class="container-fluid d-flex justify-content-center ">
                <div class="row text-center mt-5 ">
                    @foreach ($campagne->articles as $article)
                        <div class="col-md-3  text-center">
                            <div class="card p-2 border rounded">

                                <!--IMAGE-->
                                <img class="rounded-1" src="{{ asset('images/' . $article->image) }}" alt="article-image">

                                <!--DESCRIPTION-->
                                <div>
                                    <p class="card-text fw-bold fs-4 text-center border-bottom rounded">{{ $article->nom }}</p>
                                    <p class="card-text fs-5">{{ $article->description }}</p>
                                </div>

                                <!--REDUCTION-->
                                <p class="text-danger mt-3">{{ $campagne->reduction }}%</p>

                                <!--AFFICHAGE PRIX + CALCUL PRIX REMISE-->
                                <div class="text-center ">
                                    <p class="text-decoration-line-through fs-5">{{ $article->prix }}€</p>
                                    @php
                                        $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                                    @endphp
                                    <p class="text-danger fs-5">{{ number_format($prixremise, 2, ',', ' ') }}€</p>
                                </div>

                                <!--BOUTON DU DETAIL-->
                                <div class="card-body ">
                                    <a href="#" class="card-link">
                                        <button type="button" class="btn btn-outline-secondary">
                                            Détail de l'article
                                        </button>
                                    </a>

                                    <!--BOUTONS D AJOUT OU DE SUPPRESSION DES FAVORIS-->
                                    <!-- si l'utilisateur est connecté (sinon, pas de gestion des favoris)-->
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

                                      <!--BOUTON  D AJOUT AU PANIER-->      
                                    <form method="POST" action="{{ route('panier.add', $article) }}"
                                        class="form-inline d-inline-block">
                                        @csrf
                                        <input type="number" name="quantite" placeholder="Quantité"
                                            class="form-control m-1">
                                        <button type="submit" class="btn btn-outline-secondary">+ Ajouter au panier</button>
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

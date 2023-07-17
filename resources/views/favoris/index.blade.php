@extends('layout.app')

@section('content')

<!--TITRE PAGE-->
<h1 class="text-center  mt-5"><span class="px-5 border border-secondary rounded">Articles favoris</span></h1>

    <!--AFFICHAGE DES ARTICCLES FAVORIS-->
    <div class="container-fluid d-flexjustify-content-center ">
    <div class="row text-center mt-5">
        @foreach ($user->favoris as $favori)
            <div class="col-md-3 p-2">
                <div class="card p-2 border rounded">

                    <!--IMAGE-->
                    <img src="{{ asset('images/' . $favori->image) }}" alt="article-image">

                    <!--NOM ET DESCRIPTION-->
                    <div>
                        <p class="card-text fw-bold fs-3 text-center border-bottom rounded">{{ $favori->nom }}</p>
                        <p class="card-text fs-4 m-3">{{ $favori->description }}</p>
                    </div>

                    <!--affichage de la réduction à l'aide d'une fontion GetCampaign dans un helpers-->
                    @php $campagne = GetCampaign($favori->id) @endphp

                     @if ($campagne)
                     <!--calcul prix remise-->
                        <p class="text-danger"> {{$campagne->reduction}} %</p>
                        <div class="text-center d-flex justify-content-evenly">
                            

                            <p class="text-decoration-line-through">{{ $favori->prix }}€</p>

                            @php
                                $prixremise = $favori->prix - ($favori->prix * $campagne->reduction) / 100;
                            @endphp
                            <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }}€</p>

                        </div>
                    @else
                    <!--prix normal-->
                        <p>{{ $favori->prix }}€</p>
                    @endif

                    <!--BOUTONS : detail, retirer des favoris, ajout au panier-->
                    <div class="card-body ">
                        <a href="{{ route('articles.show', $favori) }}" class="card-link">
                            
                            <button type="button" class="btn btn-outline-secondary ">
                                Détail de l'article
                            </button>
                        </a>

                        <!--affichage du bouton de retrait des favoris pour le user connecté-->
                        @if (Auth::user())
                            <!-- si le produit est déjà dans les favoris-->
                            @if (Auth::user()->isInFavorites($favori))
                                <!-- si dans les favoris-->
                                <form method="post" action="{{ route('favoris.destroy', $favori->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-outline-secondary  m-2">Retirer des favoris</button>
                                </form>
                            @endif
                        @endif

                        <!--bouton d'ajout au panier-->
                        <form method="POST" action="{{ route('panier.add', $favori) }}" class="form-inline d-inline-block">
                            @csrf
                            <input type="number" name="quantite" placeholder="Quantité" class="form-control m-1">
                            <button type="submit" class="btn btn-outline-secondary">
                                + Ajouter au panier
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

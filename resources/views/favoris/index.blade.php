@extends('layouts.app')

@section('content')
    <h1 class="text-center">Mes articles Favoris</h1>

    <div class="container-fluid d-flexjustify-content-center ">
    <div class="row text-center mt-5">
        @foreach ($user->favoris as $favori)
            <div class="col-md-3 p-2">
                <div class="card p-2 border rounded">
                    <img src="{{ asset('images/' . $favori->image) }}" alt="article-image">

                    <div>
                        <h5 class="card-title m-3">{{ $favori->nom }}</h5>
                        <p class="card-text m-3">{{ $favori->description }}</p>
                    </div>

                    @php $campagne = GetCampagne($favori->id) @endphp

                    @if ($campagne)
                        <div class="text-center d-flex justify-content-evenly">
                            <p class="text-decoration-line-through">{{ $favori->prix }}€</p>

                            @php
                                $prixremise = $favori->prix - ($favori->prix * $campagne->reduction) / 100;
                            @endphp
                            <p class="text-danger">{{ number_format($prixremise, 2, ',', ' ') }}€</p>

                        </div>
                    @else
                        <p>{{ $favori->prix }}€</p>
                    @endif
                    <div class="card-body ">
                        <a href="#" class="card-link">
                            <button type="button" class="btn btn-warning">
                                Détail de l'article
                            </button>
                        </a>

                        @if (Auth::user())
                            <!-- si le produit est déjà dans les favoris-->
                            @if (Auth::user()->isInFavorites($favori))
                                <!-- si dans les favoris-->
                                <form method="post" action="{{ route('favoris.destroy', $favori->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger m-2">Retirer des favoris</button>

                                </form>
                            @endif
                        @endif
                        <form method="POST" action="{{ route('panier.add', $favori) }}" class="form-inline d-inline-block">
                            @csrf
                            <input type="number" name="quantite" placeholder="Quantité" class="form-control m-1">
                            <button type="submit" class="btn btn-success">
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

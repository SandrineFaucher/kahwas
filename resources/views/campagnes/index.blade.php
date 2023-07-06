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

            <h4 class="reduction mt-4">
                {{ $campagne->reduction }}% sur tous ces produits
            </h4>

            <div class="row text-center mt-5">
            @foreach ($campagne->articles as $article)
                
                <div class="col-md-3 p-2">  
                <div class="card p-2 border rounded">
                    <img src="images/default_picture_.jpg"{{ $article->image }}" alt="article-image">

                    <div>
                        <h5 class="card-title m-3">{{ $article->nom }}</h5>
                        <p class="card-text m-3">{{ $article->description }}</p>
                    </div>

                    <p>{{ $campagne->reduction }}%</p>

                    <div class="text-center d-flex justify-content-evenly">
                        <p class="text-decoration-line-through">{{ $article->prix }}€</p>
                        @php
                            $prixremise = $article->prix - ($article->prix * $campagne->reduction) / 100;
                        @endphp
                        <p>{{ number_format($prixremise, 2, ',', ' ') }}€</p>
                    </div>

                    <div class="card-body ">
                        <a href="#" class="card-link">
                            <button type="button" class="btn btn-warning">
                                Détail de l'article
                            </button>
                        </a>

                        <form method="POST" action="{{ route('panier.add', $article) }}"
                            class="form-inline d-inline-block">
                            @csrf
                            <input type="number" name="quantite" placeholder="Quantité" class="form-control m-1">
                            <button type="submit" class="btn btn-success">+ Ajouter au panier</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endforeach
 @endsection

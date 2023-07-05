@extends('layouts.app')

@section('content')
    <h1 class="text-center">Promotions </h1>

    <div class="card">
        @foreach ($campagnes as $campagne)
            <h2 class="card-title">
                {{ $campagne->nom }}
            </h2>

            <h5 class="card-body">
                {{ $campagne->date_debut }} / {{ $campagne->date_fin }}
            </h5>

            <h4 class="reduction">
                {{ $campagne->reduction }}% sur tous ces produits
            </h4>

            <div class="d-flex justify-content-evenly container-fluid">
                <div class="row">
                    @foreach ($campagne->articles as $article)
                      
                    <img src="..." class="card-img-top" alt="...">

                        <div class="card-body">
                            <h5 class="card-title">{{ $article->nom }}</h5>
                            <p class="card-text">{{ $article->description }}</p>
                        </div>

                        <p>{{ $campagne->reduction }}%</p>

                        <div class="text-center d-flex justify-content-evenly">
                            <p class="text-decoration-line-through">{{ $article->prix }}€</p>
                            <p>{{ $article->prix - ($article->prix * $campagne->reduction) / 100 }}€</p>
                        </div>

                        <div class="card-body ">
                            <a href="#" class="card-link">
                                <button type="button" class="btn btn-warning">
                                    Détail de l'article
                                </button>
                            </a>

                            <form action="./panier.php" method="POST">
                                @csrf
                                <input type="hidden" name="panier">
                                <input type="submit" class="btn btn-success" value="Ajouter au panier">
                            </form>
                        </div>
                 
                    @endforeach
                
            </div>
        @endforeach
    
    </div>
@endsection

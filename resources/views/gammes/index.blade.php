@extends('layouts.app')

@section('title')
    Gammes - kahwas
@endsection

@section('content')
    <h1 class="page_title text-center mx-auto">Gammes</h1>
    <div class="btn-group dropup">
        <button class="rounded-pill droptdown_gamme btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
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
        <h2 id="{{ $gamme->nom }}" class="text-center mx-auto p-4">{{ $gamme->nom }}</h2>

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
                                    <p>{{ $article->prix }} €</p>
                                </div>
                                {{-- Ajout pannier --}}
                                {{-- <form method="POST" action="{{ route('panier.add', 1) }}"
                                            class="form-inline d-inline-block">
                                            {{ csrf_field() }}
                                            <input type="number" name="quantite" placeholder="Quantité ?"
                                                class="form-control mr-2">
                                            {{-- value="{{ isset(session('panier')[$article->id]) ? session('panier')[$article->id]['quantite'] : null }}"> --}}
                                {{-- <!-- value = afficher la quantité du produit s'il se trouve au panier--> --}}

                                <!-- <button type="submit" class="ajoutPanier btn">+ Ajouter au panier</button> </form>-->
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach

@extends('layouts.app')

@section('content')
    <h1 class="text-center"> Détail de la commande n° {{ $commande->numero }} </h1>

    <p class="text-center pt-5 fs-3">Montant : <strong>{{($commande->prix)}} €</strong></p>



    <p class="text-center pt-3 fs-3">Date : <strong>
        {{ date('d/m/y', strtotime($commande->created_at)) }} à
        {{ date('H', strtotime($commande->created_at)) }}h
        {{ date('i', strtotime($commande->created_at)) }}</strong></p>

    <div class="container-fluid p-5">

        @foreach ($commande->articles as $article)
            <div class="table-responsive shadow mb-3">

                <table class=" table table-bordered  p-5 fs-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col">Prix unitaire</th>
                            @if(!empty($article->pivot->reduction))
                            <th scope="col">Réduction</th>
                            <th scope="col">Prix remise</th>
                            @endif
                            <th scope="col">Description</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">{{ $article->nom }}</th>
                            <td>{{ $article->prix }} €</td>
                            @if (!empty($article->pivot->reduction))
                             <td>- {{ $article->pivot->reduction }} %</td>
                             @php
                                $prixremise = $article->prix - ($article->prix * $article->pivot->reduction) / 100;
                             @endphp
                            @else
                                <td>Aucune réduction</td>
                            @endif
                            <td>{{$prixremise}} €</td>
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->pivot->quantite }}</td>

                            <td>{{ ($article->prix * $article->pivot->quantite) - $prixremise }} €</td>
                        </tr>
                </table>
            </div>

            <p class="text-center fs-3">Frais de port : </p>
        @endforeach
    </div>
@endsection

@extends('layout.app')

@section('content')

    <!--TITRE DE PAGE : NUMERO DE LA COMMANDE-->
    <h1 class="text-center p-0 "><span class="px-5 border border-secondary rounded">Détail de la commande </span> </h1>
    <p class="text-center pt-5 fs-1" >n° {{$commande->numero }} </p>
    <!--MONTANT-->
    <p class="text-center pt-5 fs-3">Montant : <strong>{{($commande->prix)}} €</strong></p>


    <!--DATES DE COMMANDE-->
    <p class="text-center pt-3 fs-3">Date : <strong>
        {{ date('d/m/y', strtotime($commande->created_at)) }} à
        {{ date('H', strtotime($commande->created_at)) }}h
        {{ date('i', strtotime($commande->created_at)) }}</strong></p>


    <!--CONDITIONS D AFFICHAGE EN FONCTION DE L EXISTENCE DE REDUCTIONS-->  
    <div class="container-fluid p-5">
        @php
        $totalsansfrais = 0;
        @endphp
        @foreach ($commande->articles as $article)
            <div class="table-responsive shadow mb-3">

                <table class=" table table-bordered  p-5 fs-5">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Article</th>
                            <th scope="col">Prix unitaire</th>
                            <!--si le champ réduction de la table article n'est pas vide
                            j'affiche cette réduction-->
                            
                            <th scope="col">Réduction</th>
                            <th scope="col">Prix réduit</th>
                            
                            <th scope="col">Description</th>
                            <th scope="col">Quantité</th>
                            <th scope="col">Prix</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <th scope="row">{{ $article->nom }}</th>
                            <td>{{ $article->prix }} €</td>
                            <!--si le champ réduction de la table article n'est pas vide
                            j'affiche la réduction dans la colonne-->
                            @if (!empty($article->pivot->reduction))
                             <td>- {{ $article->pivot->reduction }} %</td>
                            @else
                            <td>Aucune réduction</td>
                            @endif
                            <!--je calcule le prix de ma remise-->
                            @php
                            $prixremise = $article->prix - ($article->prix * $article->pivot->reduction) / 100;
                            @endphp

                            <!--si le champ réduction de la table article n'est pas vide
                            j'affiche le prix réduit-->
                            @if (!empty($article->pivot->reduction))
                            <td>{{number_format($prixremise, 2, ',', ' ')}} €</td>
                            @else
                            <td> - </td>
                            @endif
                            <td>{{ $article->description }}</td>
                            <td>{{ $article->pivot->quantite }}</td>
                            <!--si le champ réduction de la table article n'est pas vide
                            j'affiche le prix réduit-->
                            @php
                            $total =( $prixremise * $article->pivot->quantite);
                            @endphp

                            @if (!empty($article->pivot->reduction))
                            <td>{{(number_format($total, 2, ',', ' ')) }} €</td>
                            @else
                            <!--sinon j'affiche le prix sans réduction-->
                            @php
                            $total = $article->prix * ($article->pivot->quantite);
                            @endphp
                            <td>{{(number_format($total, 2, ',', ' '))}} €</td>

                            @endif

                        </tr>
                </table>
            </div>

            @php
            $totalsansfrais += $total;
            @endphp
        @endforeach

        <p class="text-center fs-3">Frais de port : 
               {{number_format($commande->prix - $totalsansfrais, 2, ',' ,' ') }}€
          
        </p>
    </div>
@endsection

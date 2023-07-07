@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <h1>Mon panier</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
                            <th>Opérations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Initialisation du total général à 0 -->
                        @php $total = 0 @endphp

                        <!-- On parcourt les produits du panier en session : session('panier') -->
                        @foreach (session('panier') as $position => $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    {{-- <strong><a href="{{ route('article.show', $position) }}" title="Afficher le produit" >{{ $article['nom'] }}</a></strong> --}}
                                    {{ $article['nom'] }}
                                </td>

                                <!-- si la clé campagne existe pour cet article, il est en promo actuellement -->
                                @if (isset($article['campagne']))
                                    <td>{{ $article['campagne']->nom }} :
                                        -{{ $article['campagne']->reduction }}%
                                        <del>{{ $article['prix'] }} €</del>
                                        @php $prixremise = $article['prix']- ($article['prix'] * $article['campagne']->reduction / 100)@endphp
                                        {{ number_format($prixremise, 2, ',', ' ') }}€
                                    </td>
                                @else
                                    <td>{{ $article['prix'] }} €</td>
                                @endif

                                <td>
                                    <!-- Le formulaire de mise à jour de la quantité -->
                                    <form method="POST" action="{{ route('panier.add', $position) }}"
                                        class="form-inline d-inline-block">
                                        {{ csrf_field() }}
                                        <input type="number" name="quantite" placeholder="Quantité ?"
                                            value="{{ $article['quantite'] }}" class="form-control mr-2"
                                            style="width: 80px">
                                        <input type="submit" class="actualiserQuantite btn" value="Actualiser" />
                                    </form>
                                </td>
                                <td>
                                    <!-- Le total du produit = prix * quantité -->
                                    @if (isset($article['campagne']))
                                        {{ number_format($prixremise * $article['quantite'], 2, ',', ' ') }}€
                                    @else
                                        {{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }}€
                                    @endif
                                </td>
                                <td>
                                    <!-- Le Lien pour retirer un produit du panier -->
                                    <a href="{{ route('panier.remove', $position) }}" class="btn btn-outline-danger"
                                        title="Retirer le produit du panier">Retirer</a>
                                </td>
                            </tr>

                            <!-- On incrémente le total général par le total de chaque produit du panier -->
                            @if (isset($article['campagne']))
                                @php $total += $prixremise* $article['quantite'] @endphp
                            @else
                                @php $total += $article['prix'] * $article['quantite'] @endphp
                            @endif
                        @endforeach
                        <tr colspan="2">
                            <td colspan="4">Total général</td>
                            <td colspan="2">
                                <!-- On affiche total général -->
                                <strong>{{ number_format($total, 2, ',', ' ') }} €</strong>
                            </td>
                        </tr>
                    </tbody>

                </table>
            </div>

            <!-- Lien pour valider le panier -->
            @if (Auth::user())
                <a class="btn btn-primary" href="{{ route('validation') }}" title="Valider le panier">Valider</a>
            @endif
			
            <!-- Lien pour vider le panier -->
            <a class="btn btn-danger" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier">Vider
                le panier</a>
        @else
            <div class="alert alert-info">Aucun produit au panier</div>
        @endif

    </div>
@endsection

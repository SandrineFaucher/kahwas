@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <h1>Valider ma commande</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>#</th>
                            <th>Produit</th>
                            <th>Prix</th>
                            <th>Quantité</th>
                            <th>Total</th>
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
                                    {{ $article['quantite'] }}
                                </td>

                                <td>
                                    <!-- Le total du montant du produit = prix * quantité -->
                                    @if (isset($article['campagne']))
                                        {{ number_format($prixremise * $article['quantite'], 2, ',', ' ') }}€
                                    @else
                                        {{ number_format($article['prix'] * $article['quantite'], 2, ',', ' ') }}€
                                    @endif

                                    <!-- On incrémente le total général par le total de chaque produit du panier -->
                                    @if (isset($article['campagne']))
                                        @php $total += $prixremise* $article['quantite'] @endphp
                                    @else
                                        @php $total += $article['prix'] * $article['quantite'] @endphp
                                    @endif
                                </td>
                            </tr>
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

            <!-- Lien pour valider la commande -->
            <a class="btn btn-primary" href="{{ route('validation') }}" title="Valider la commande">Valider la commande</a>

            <!-- Lien pour vider le panier -->
            <a class="btn btn-danger" href="{{ route('panier.empty') }}" title="Retirer tous les produits du panier">Vider
                le panier</a>



                 <!-- Section MODIF INFOS
        ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                    ============================================================ -->
                    <div class="card my-4">


                        <!-- Card header "S'inscrire"
                        ============================================================ -->
                        <div class="card-header"><small>{{ __('Modification des informations personnelles') }}</small></div>


                        <!-- Card body
                        ============================================================ -->
                        <div class="card-body">


                            <!-- Formulaire modif infos
                            ============================================================ -->
                            <form method="POST" action="{{ route('user.update', $user) }}">
                                @csrf
                                @method('PUT')


                                <!-- Section nom + prenom
                                ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- Nom
                                    ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="nom" class="col-form-label ms-1"><small>{{ __('Nouveau nom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="nom" type="text" placeholder="Nouveau nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ $user->nom }}" required autocomplete="on" autofocus>  

                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Prenom
                                    ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="prenom" class="col-form-label ms-1"><small>{{ __('Nouveau prénom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prenom" type="text" placeholder="Nouveau prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ $user->prenom }}" required autocomplete="prenom" autofocus>

                                            @error('prenom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <!-- Email
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="email" class="col-form-label ms-1"><small>{{ __('Nouvelle adresse e-mail') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Nouvelle adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- Boutton validation modification
                                ============================================================ -->
                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-primary col-12"><small>{{ __('Modifier mes informations') }}</small></button>
                                    </div>
                                </div>


                            </form>





            <form action="{{route('fraisdeport')}}" method="POST">
                @csrf

                <label for="fraisdeport">Type de livraison :</label>
                <select name="fraisdeport" id="fraisdeport">
                    
                    
                    <option value="5"@if (session('fraisdeport') && session()->get('fraisdeport') === '5') selected @endif>>Classique, à domicile (48h) : 5€</option>

                    
                    <option value="9.90"@if (session('fraisdeport') && session()->get('fraisdeport') === '9.90') selected @endif>>Express, à domicile (24h) : 9.90€</option>
                    
                    
                    <option value="4"@if (session('fraisdeport') && session()->get('fraisdeport') === '4') selected @endif>>En point relais (48h) : 4€</option>
                </select>

                <button type="submit">Soumettre</button>
            </form>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <!-- On incrémente le total à payer -->
            <td>
               Total à payer : {{-- @php $totalapayer = $total + $fraisPort @endphp --}}
            </td>
        @endif
    </div>
@endsection

@extends('layouts.app')
@section('content')
    <div class="container">

        @if (session()->has('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @endif

        @if (session()->has('panier'))
            <h1 class="text-center m-5">Valider ma commande</h1>
            <div class="table-responsive shadow mb-3">
                <table class="table table-bordered table-hover bg-white mb-0">
                    <thead class="thead-dark">
                        <tr class="tableau">
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


            <!-- Section MODIF/VALID INFOS
                                                                    ============================================================ -->
            <div class="container-fluid m-5">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <!-- Card
                                                                                ============================================================ -->
                        <div class="card my-4">


                            <!-- Card header "S'inscrire"
                                                                                    ============================================================ -->
                            <div class="card-header"><small>{{ __('Informations personnelles') }}</small></div>


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
                                            <label for="nom"
                                                class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="nom" type="text" placeholder="Nom"
                                                    class="form-control @error('nom') is-invalid @enderror" name="nom"
                                                    value="{{ $user->nom }}" required autocomplete="nom" autofocus>

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
                                            <label for="prenom"
                                                class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="prenom" type="text" placeholder="Prénom"
                                                    class="form-control @error('prenom') is-invalid @enderror"
                                                    name="prenom" value="{{ $user->prenom }}" required
                                                    autocomplete="prenom" autofocus>

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
                                        <label for="email"
                                            class="col-form-label ms-1"><small>{{ __('E-mail') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="email" type="email" placeholder="E-mail"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ $user->email }}" required autocomplete="email">

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
                                            <button type="submit"
                                                class="btn btn-primary col-12"><small>{{ __('Valider mes informations') }}</small></button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- ========================== Choisir adresse de livraison et de facturation ========================== -->

            <h3 class="text-center p-3">Adresse de livraison</h3>

            <div class="row pb-3">
                <div class="col-6 offset-3 text-center border border-info pb-3">

                    <!-- affichage de l'adresse choisie -->

                    @if (session('adresseLivraison') !== null)
                        @php $adresseLivraison = session('adresseLivraison') @endphp

                        <div class="fw-bold pt-3">
                            <p>{{ $user->prenom }} {{ $user->nom }}</p>
                            <p>{{ $adresseLivraison->adresse }}</p>
                            <p>{{ $adresseLivraison->code_postal }} {{ $adresseLivraison->ville }}</p>
                        </div>
                    @else
                        <p class="mt-4">Aucune adresse choisie.</p>
                    @endif

                    <!-- si le user a enregistré des adresses, je lui propose le choix -->

                    @if (count($user->adresses) > 0)
                        <form action="{{ route('cart.validation') }}" class="p-3" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="adresseLivraisonId">Choisissez une adresse</label>
                                <select name="adresseLivraisonId" id="adresseLivraisonId">
                                    <option value=""></option>
                                    @foreach ($user->adresses as $adresse)
                                        <option value="{{ $adresse->id }}">
                                            <p>{{ $adresse->adresse }}</p>
                                            <p>{{ $adresse->code_postal }}</p>
                                            <p>{{ $adresse->ville }}</p>
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-warning">Sélectionner</button>
                            </div>
                        </form>

                        <!-- si le user n'a pas enregistré d'adresses -->
                    @else
                        <p class="rounded m-auto m-5 pt-4 p-3 bg-danger text-white">Vous n'avez aucune adresse enregistrée.
                            Ajoutez-en une dans l'espace client.
                    @endif

                </div>
            </div>

            <h3 class="text-center p-3">Adresse de facturation</h3>

            <div class="row pb-3">
                <div class="col-6 offset-3 text-center border border-info pb-3">

                    @if (session('adresseFacturation') !== null)
                        @php $adresseFacturation = session('adresseFacturation') @endphp

                        <div class="fw-bold pt-3">
                            <p>{{ $user->prenom }} {{ $user->nom }}</p>
                            <p>{{ $adresseFacturation->adresse }}</p>
                            <p>{{ $adresseFacturation->code_postal }} {{ $adresseFacturation->ville }}</p>
                        </div>
                    @else
                        <p class="mt-4">Aucune adresse choisie.</p>
                    @endif

                    @if (count($user->adresses) > 0)
                        <form action="{{ route('cart.validation') }}" class="p-3" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="adresseFacturationId">Choisissez une adresse</label>
                                <select name="adresseFacturationId" id="adresseFacturationId">
                                    <option value=""></option>
                                    @foreach ($user->adresses as $adresse)
                                        <option value="{{ $adresse->id }}">
                                            <p>{{ $adresse->adresse }}</p>
                                            <p>{{ $adresse->code_postal }}</p>
                                            <p>{{ $adresse->ville }}</p>
                                        </option>
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-warning">Sélectionner</button>
                            </div>
                        </form>
                    @else
                        <p class="rounded m-auto m-5 pt-4 p-3 bg-danger text-white">Vous n'avez aucune adresse enregistrée.
                            Ajoutez-en une dans l'espace client.
                    @endif

                </div>
            </div>



            <!-- ============================================================ Section FRAIS DE PORT ============================================================ -->

            <form action="{{ route('fraisdeport') }}" method="POST" class="text-center">
                @csrf
                @method('GET')

                <label for="fraisdeport">Type de livraison :</label>
                <select name="fraisdeport" id="fraisdeport">


                    <option value="5"@if (session('fraisdeport') && session()->get('fraisdeport') === 5) selected @endif>Classique, à
                        domicile (48h) : 5€</option>


                    <option value="9.90"@if (session('fraisdeport') && session()->get('fraisdeport') === 9.9) selected @endif>Express, à
                        domicile (24h) : 9.90€</option>


                    <option value="4"@if (session('fraisdeport') && session()->get('fraisdeport') === 4) selected @endif>En point
                        relais (48h) : 4€</option>
                </select>

                <button type="submit">Soumettre</button>
            </form>


            <!-- Message de succès -->

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif



            <!-- ============================================================== TOTAL A PAYER ============================================================ -->

            <!-- On incrémente le total à payer -->
            @php $totalapayer = $total + session('fraisdeport') @endphp

            <td>
                <!-- On affiche le total à payer avec un arrondi de 2 chiffres après la virgule -->
                <div class="text-center m-5">Total à payer :<strong>{{ number_format($totalapayer, 2, ',', ' ') }} €</strong></div>
                
            </td>


            <!-- ===================================================== BOUTON VALIDER LA COMMANDE ===================================================== -->


            <div class="d-flex justify-content-center">

                <!-- Button trigger modal -->
                @if (session('adresseLivraison') !== null && session('adresseFacturation') !== null && session('fraisdeport') !== null)
                <button type="submit" name="clearCart" class="btn btn-primary" data-bs-toggle="modal"
                    data-bs-target="#exampleModal">
                    Valider la commande
                </button>
                @endif

            </div>









            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content text-center">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5 mx-auto text-center" id="exampleModalLabel">Félicitations !</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Votre commande a été validée.</p>
                            <!--Afficher le montant total du panier-->
                            <p> Le montant total est de <strong>{{ number_format($totalapayer, 2, ',', ' ') }} €</strong></p>
                            <p>Expédition à partir du <?php
                            // **** obtenir et afficher la date du jour formatée ****
                            $dateJour = date('d-m-Y');
                            echo $dateJour;
                            ?> </p>
                            <p>Livraison estimée le
                                <?php
                                // ********************* calcul : date du jour + 3 jours *****************
                                
                                // je récupère la date du jour en format DateTime (exigé par la fonction date_add)
                                $date = new DateTime('now');
                                
                                // on utilise date_add pour ajouter 3 jours
                                // date_interval... => permet d'obtenir l'intervalle de temps souhaité pour l'ajouter
                                date_add($date, date_interval_create_from_date_string('3 days'));
                                
                                // à ce stade, $date est directement modifiée
                                // je l'affiche en la formatant : jour mois année => 09-06-2023
                                echo date_format($date, 'd-m-Y');
                                ?>
                            </p>
                            <p>Merci de votre confiance.</p>
                        </div>
                        <div class="modal-footer">
                            <form method="POST" action="./index.blade.php">
                                <button type="submit" name="commandeValidee" class="btn btn-primary">
                                    Retour à l'accueil
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

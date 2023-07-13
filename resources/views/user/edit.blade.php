@extends('layout.app')

@section('title')
    Mon compte
@endsection

@section('content')


    <div class="pb-5 pt-5" id="edit_blade_user">
        <h2 class="text-center fs-1">Informations personnelles</h2>

        <!-- FORMULAIRE MODIF INFO + MODIF PASSWORD 
        ============================================================ -->
        <div class="d-flex align-items-center" id="edit_blade_formulaire_infos_mdp">


            <!-- Section modif info
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


                                <!-- Boutton supression compte
                                ============================================================ -->
                                <div class="row mb-0 mt-2">
                                    <div class="col-md-12">
                                        <form action="{{route('user.destroy', $user)}}" method="POST">
                                        @csrf
                                        @method("delete")
                                            <button type="submit" class="btn btn-danger col-12"><small>Supprimer le compte</small></button>
                                        </form>
                                    </div>
                                </div>


                            </div>


                        </div>


                    </div>
                </div>
            </div>






            <!-- Section MODIF MOT DE PASSE
            ============================================================ -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <!-- Card
                        ============================================================ -->
                        <div class="card mt-4">


                            <!-- Card header "S'inscrire"
                            ============================================================ -->
                            <div class="card-header"><small>{{ __('Modification mot de passe') }}</small></div>


                            <!-- Card body
                            ============================================================ -->
                            <div class="card-body">


                                <!-- Formulaire modif infos
                                ============================================================ -->
                                <form method="POST" action="{{ route('updatepassword', $user) }}">
                                @csrf
                                @method('PUT')


                                    <!-- Section nom + prenom
                                    ============================================================ -->
                                    <div class="d-flex justify-content-center gap-2">


                                        <!-- Mot de passe actuel
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="password" class="col-form-label ms-1"><small>{{ __('Mot de passe actuel') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="password" type="password" placeholder="Mot de passe actuel" class="form-control @error('password') is-invalid @enderror" name="actuel_password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Nouveau mot de passe
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="password" class="col-form-label ms-1"><small>{{ __('Nouveau mot de passe') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="password" type="password" placeholder="Nouveau mot de passe" class="form-control @error('password') is-invalid @enderror" name="nouveau_password" value="{{ old('password') }}" required autocomplete="password" autofocus>
                                                <div id="emailHelp" class="form-text ms-1">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</div>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Confirmation mot de passe
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="password" class="col-form-label ms-1"><small>{{ __('Nouveau mot de passe') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="password" type="password" placeholder="Nouveau mot de passe" class="form-control @error('password') is-invalid @enderror" name="nouveau_password_confirmation" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>


                                    <!-- Boutton validation modification
                                    ============================================================ -->
                                    <div class="row mb-0 mt-2">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary col-12"><small>{{ __('Modifier le mot de passe') }}</small></button>
                                        </div>
                                    </div>


                                </form>


                            </div>


                        </div>


                    </div>
                </div>
            </div>


        </div>





        <!-- Section formulaires creation adresse + modification adresse
        ============================================================ -->
        <div class="d-flex align-items-center" id="edit_blade_formulaire_infos_mdp">


            <!-- Section creation adresse
            ============================================================ -->
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">


                        <!-- Card
                        ============================================================ -->
                        <div class="card mt-4">


                            <!-- Card header "creation adresse"
                            ============================================================ -->
                            <div class="card-header"><small>{{ __('Créer une adresse') }}</small></div>


                            <!-- Card body
                            ============================================================ -->
                            <div class="card-body">


                                <!-- Formulaire modif infos
                                ============================================================ -->
                                <form method="POST" action="{{ route('adresse.store') }}">
                                @csrf


                                    <!-- Section nom + prenom
                                    ============================================================ -->
                                    <div class="d-flex justify-content-center gap-2">


                                        <!-- Nom
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="ville" class="col-form-label ms-1"><small>{{ __('Ville') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="ville" type="text" placeholder="Ville" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ old('ville') }}" required autocomplete="ville" autofocus>

                                                @error('ville')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Prenom
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="code_postal" class="col-form-label ms-1"><small>{{ __('Code postal') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="code_postal" type="text" placeholder="Code postal" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ old('code_postal') }}" required autocomplete="code_postal" autofocus>

                                                @error('code_postal')
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
                                        <label for="adresse" class="col-form-label ms-1"><small>{{ __('Adresse') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="adresse" type="text" placeholder="Adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ old('adresse') }}" required autocomplete="adresse">

                                            @error('adresse')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- Boutton validation modification
                                    ============================================================ -->
                                    <div class="row mb-0">
                                        <div class="col-md-12 mt-2">
                                            <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                            <button type="submit" class="btn btn-primary col-12"><small>{{ __('Créer mon adresse') }}</small></button>
                                        </div>
                                    </div>


                                </form>


                            </div>


                        </div>


                    </div>
                </div>
            </div>






            <!-- Section modif adresse
            ============================================================ -->
            <div class="container-fluid overflow-auto mt-2 me-2" style="max-height: 310px;">
                <div class="row justify-content-center">
                    <div class="col-md-10 border border-dark p-2 rounded">

                        <h2>Vos adresses existantes</h2>


                        <!-- Boucle qui affiche formulaire modif pour chaque adresse enregistrer
                        ============================================================ -->
                        @foreach ($user->adresses as $adresse)


                            <!-- Card
                            ============================================================ -->
                            <div class="card mt-4">


                                <!-- Card header "Modification adresse"
                                ============================================================ -->
                                <div class="card-header"><small>{{ __('Modification adresse') }}</small></div>


                                <!-- Card body
                                ============================================================ -->
                                <div class="card-body">


                                    <!-- Formulaire modif infos
                                    ============================================================ -->
                                    <form method="POST" action="{{ route('adresse.update', $adresse) }}">
                                    @csrf
                                    @method('PUT')


                                        <!-- Section nom + prenom
                                        ============================================================ -->
                                        <div class="d-flex justify-content-center gap-2">


                                            <!-- Ville
                                            ============================================================ -->
                                            <div class="col mb-3">
                                                <label for="ville" class="col-form-label ms-1"><small>{{ __('Ville') }}</small></label>

                                                <div class="col-md-12">
                                                    <input id="ville" type="text" placeholder="Ville" class="form-control @error('ville') is-invalid @enderror" name="ville" value="{{ $adresse->ville }}" required autocomplete="ville" autofocus>

                                                    @error('ville')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <!-- Code postal
                                            ============================================================ -->
                                            <div class="col mb-3">
                                                <label for="code_postal" class="col-form-label ms-1"><small>{{ __('Code postal') }}</small></label>

                                                <div class="col-md-12">
                                                    <input id="code_postal" type="text" placeholder="Code postal" class="form-control @error('code_postal') is-invalid @enderror" name="code_postal" value="{{ $adresse->code_postal }}" required autocomplete="code_postal" autofocus>

                                                    @error('code_postal')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>


                                        </div>


                                        <!-- Adresse
                                        ============================================================ -->
                                        <div class="col mb-3">
                                            <label for="adresse" class="col-form-label ms-1"><small>{{ __('Adresse') }}</small></label>

                                            <div class="col-md-12">
                                                <input id="adresse" type="text" placeholder="Adresse" class="form-control @error('adresse') is-invalid @enderror" name="adresse" value="{{ $adresse->adresse }}" required autocomplete="adresse">

                                                @error('adresse')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>


                                        <!-- Boutton validation modification
                                        ============================================================ -->
                                        <div class="row mb-0">
                                            <div class="col-md-12 mt-2">
                                                <input type="hidden" value="{{ auth()->user()->id }}" name="user_id">
                                                <button type="submit" class="btn btn-primary col-12"><small>{{ __('Modifier mon adresse') }}</small></button>
                                            </div>
                                        </div>


                                    </form>


                                    <!-- Bouton suppression compte 
                                    ============================================================ -->
                                    <div class="row mb-0 mt-2">
                                        <div class="col-md-12">
                                            <form action="{{ route('user.destroy', $user) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                                <button type="submit" class="btn btn-danger col-12"><small>Supprimer l'adresse</small></button>
                                            </form>
                                        </div>
                                    </div>


                                </div>


                            </div>

                        @endforeach

                    </div>
                </div>
            </div>


        </div>
    </div>
    



@endsection

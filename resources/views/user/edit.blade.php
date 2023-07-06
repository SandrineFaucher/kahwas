@extends('layout.app')

@section('title')
    Mon compte
@endsection

@section('content')


    <!-- Section formulaires modification informations + mot de passe
    ============================================================ -->
    <div class="d-flex">


        <!-- Container
        ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                    ============================================================ -->
                    <div class="card">


                        <!-- Card header "S'inscrire"
                        ============================================================ -->
                        <div class="card-header">{{ __('Modification des informations personnelles') }}</div>


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
                                            <input id="nom" type="text" placeholder="Nouveau nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

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
                                            <input id="prenom" type="text" placeholder="Nouveau prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

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
                                        <input id="email" type="email" placeholder="Nouvelle adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- sectionBoutton validation / supression
                                ============================================================ -->
                                <div class="d-flex justify-content-between mt-4">


                                    <!-- Boutton validation modification
                                    ============================================================ -->
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary"><small>{{ __('Modifier mes informations') }}</small></button>
                                        </div>
                                    </div>


                                    <!-- Boutton supression compte
                                    ============================================================ -->
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <form action="{{route('user.destroy', $user)}}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger col-12"><small>Supprimer le compte</small></button>
                                            </form>
                                        </div>
                                    </div>


                                </div>


                            </form>


                        </div>


                    </div>


                </div>
            </div>
        </div>






        <!-- Container
        ============================================================ -->
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">


                    <!-- Card
                    ============================================================ -->
                    <div class="card">


                        <!-- Card header "S'inscrire"
                        ============================================================ -->
                        <div class="card-header">{{ __('Modification des informations personnelles') }}</div>


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
                                            <input id="nom" type="text" placeholder="Nouveau nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus>

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
                                            <input id="prenom" type="text" placeholder="Nouveau prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus>

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
                                        <input id="email" type="email" placeholder="Nouvelle adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- sectionBoutton validation / supression
                                ============================================================ -->
                                <div class="d-flex justify-content-between mt-4">


                                    <!-- Boutton validation modification
                                    ============================================================ -->
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-primary"><small>{{ __('Modifier mes informations') }}</small></button>
                                        </div>
                                    </div>


                                    <!-- Boutton supression compte
                                    ============================================================ -->
                                    <div class="row mb-0">
                                        <div class="col-md-12">
                                            <form action="{{route('user.destroy', $user)}}" method="POST">
                                                @csrf
                                                @method("delete")
                                                <button type="submit" class="btn btn-danger col-12"><small>Supprimer le compte</small></button>
                                            </form>
                                        </div>
                                    </div>


                                </div>


                            </form>


                        </div>


                    </div>


                </div>
            </div>
        </div>


    </div>



@endsection

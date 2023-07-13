@extends('layout.app')

@section('content')


    <!-- CONTAINER
    ============================================================ -->
    <div class="container-fluid" id="register_blade" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(255, 255, 255, 0)), url(../images/image_fond_formulaire.jpeg);">
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- CARD
                ============================================================ -->
                <div class="card text-light border-secondary mt-5" id="register_blade_card">


                    <!-- CARD HEADER
                    ============================================================ -->
                    <div class="card-header border-bottom border-secondary"><small>{{ __('Inscription') }}</small></div>


                    <!-- CARD BODY
                    ============================================================ -->
                    <div class="card-body">


                        <!-- FORMULAIRE INSCRIPTION
                        ============================================================ -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <!-- SECTION NOM + PRENOM
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- NOM
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="nom" class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="nom" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="on" autofocus>

                                        @error('nom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- PRENOM
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="prenom" class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="prenom" type="text" placeholder="Prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="on" autofocus>

                                        @error('prenom')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                            </div>


                            <!-- EMAIL
                            ============================================================ -->
                            <div class="col mb-3">
                                <label for="email" class="col-form-label ms-1"><small>{{ __('Adresse e-mail') }}</small></label>

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="on" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- SECTION MOT DE PASSE
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- MOT DE PASSE
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="password" class="col-form-label ms-1"><small>{{ __('Mot de passe') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off" autofocus>
                                        <div id="emailHelp" class="form-text text-light ms-1">8 et 15 caracteres. minimum 1 lettre, 1 chiffre et 1 caractère spécial</div>

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- CONFIRMATION MOT DE PASSE 
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="password-confirm" class="col-form-label ms-1"><small>{{ __('Confirmez mot de passe') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" placeholder="Confirmez mot de passe" class="form-control" name="password_confirmation" required autocomplete="off">
                                    </div>
                                </div>


                            </div>


                            <!-- BOUTTON VALIDATION INSCRIPTION
                            ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary"><small class="text-light">{{ __('S\'inscrire') }}</small></button>
                                </div>
                            </div>


                        </form>


                    </div>


                </div>


            </div>
        </div>
    </div>


@endsection

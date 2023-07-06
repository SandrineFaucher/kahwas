@extends('layout.app')

@section('content')


    <!-- Container
    ============================================================ -->
    <div class="container-fluid" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(255, 255, 255, 0)), url(../images/image_fond_formulaire.jpeg); height: 100vh; width:100%; background-size: cover; background-position: center">
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- Card
                ============================================================ -->
                <div class="card text-light border-secondary mt-5" style="background-color: #ffb7003e; backdrop-filter: blur(7px); box-shadow: 1px 7px 7px rgba(0, 0, 0, 0.945); text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.926)">


                    <!-- Card header "Inscription"
                    ============================================================ -->
                    <div class="card-header border-bottom border-secondary"><small>{{ __('Inscription') }}</small></div>


                    <!-- Card body
                    ============================================================ -->
                    <div class="card-body">


                        <!-- Formulaire inscription
                        ============================================================ -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf


                            <!-- Section nom + prenom
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- Nom
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="nom" class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="nom" type="text" placeholder="Nom" class="form-control @error('name') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus style="box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.782)">

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
                                    <label for="prenom" class="col-form-label ms-1"><small>{{ __('Prénom') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="prenom" type="text" placeholder="Prénom" class="form-control @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus style="box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.782)">

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
                                <label for="email" class="col-form-label ms-1"><small>{{ __('Adresse e-mail') }}</small></label>

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" style="box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.782)">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- section mot de passe
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- Mot de passe
                                ============================================================ -->
                                <div class="col mb-3">
                                    <label for="password" class="col-form-label ms-1"><small>{{ __('Mot de passe') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" style="box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.782)">

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
                                    <label for="password-confirm" class="col-form-label ms-1"><small>{{ __('Confirmer mot de passe') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="password-confirm" type="password" placeholder="Confirmer mot de passe" class="form-control" name="password_confirmation" required autocomplete="new-password" style="box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.782)">
                                    </div>
                                </div>


                            </div>


                            <!-- Boutton validation inscription
                            ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary" style="background-color: #3f3028cf; box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.782)"><small class="text-light">{{ __('S\'inscrire') }}</small></button>
                                </div>
                            </div>


                        </form>


                    </div>


                </div>


            </div>
        </div>
    </div>


@endsection

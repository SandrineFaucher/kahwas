@extends('layout.app')

@section('content')


    <!-- Container
    ============================================================ -->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- Card
                ============================================================ -->
                <div class="card">


                    <!-- Card header "Connexion"
                    ============================================================ -->
                    <div class="card-header">{{ __('Connexion') }}</div>


                    <!-- Card body
                    ============================================================ -->
                    <div class="card-body">


                        <!-- Formulaire inscription
                        ============================================================ -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf


                            <!-- Section nom + prenom
                            ============================================================ -->
                            <div class="d-flex justify-content-center gap-2">


                                <!-- Adresse email + checkbox "se souvenir de moi"
                                ============================================================ -->
                                <div class="col mb-3">

                                    <!-- email -->
                                    <label for="email" class="col-form-label ms-1"><small>{{ __('Adresse e-mail') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="email" type="email" placeholder="Adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- checkbox -->
                                    <div class="form-check mt-2 ms-1">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember"><small>{{ __('Se souvenir de moi') }}</small></label>
                                    </div>

                                </div>


                                <!-- Mot de passe + lien "mot de passe oublié ?"
                                ============================================================ -->
                                <div class="col mb-3">

                                    <!-- mot de passe -->
                                    <label for="password" class="col-form-label ms-1"><small>{{ __('Mot de passe') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="password" type="password" placeholder="Mot de passe" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <!-- lien --> 
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link p-0 mt-2 ms-1" href="{{ route('password.request') }}"><small>{{ __('Mot de passe oublié ?') }}</small></a>
                                    @endif

                                </div>


                            </div>


                            <!-- Boutton connexion
                            ============================================================ -->
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary col-12"><small>{{ __('Connexion') }}</small></button>
                                </div>
                            </div>


                        </form>


                    </div>


                </div>


            </div>
        </div>
    </div>


@endsection

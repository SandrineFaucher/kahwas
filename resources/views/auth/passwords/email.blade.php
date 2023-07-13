@extends('layout.app')

@section('content')


    <!-- Container
    ============================================================ -->
    <div class="container-fluid" id="email_blade" style="background-image: linear-gradient(to right, rgba(0, 0, 0, 0.4), rgba(255, 255, 255, 0)), url(../images/image_fond_formulaire.jpeg);">
        <div class="row justify-content-center">
            <div class="col-md-5">


                <!-- Card
                ============================================================ -->
                <div class="card text-light border-secondary mt-5" id="email_blade_card">


                    <!-- Card header "Inscription"
                    ============================================================ -->
                    <div class="card-header"> <small>{{ __('Réinitialiser le mot de passe') }}</small></div>


                    <!-- Card body
                    ============================================================ -->
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif


                        <!-- Formulaire réinitialisation mot de passe
                        ============================================================ -->
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf


                            <!-- Email
                            ============================================================ -->
                            <div class="col mb-3">
                                <label for="email" class="col-form-label ms-1"><small>{{ __('Adresse e-mail') }}</small></label>

                                <div class="col-md-12">
                                    <input id="email" type="email" placeholder="Adresse e-mail" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Boutton Envoyer...
                            ============================================================ -->
                            <div class="row mb-0 mt-4">
                                <div class="col-md-12">
                                    <button type="submit" class="btn col-12 border-secondary"><small class="text-light">{{ __('Envoyer le lien de réinitialisation du mot de passe') }}</small>
                                    </button>
                                </div>
                            </div>


                        </form>


                    </div>


                </div>


            </div>
        </div>
    </div>


@endsection

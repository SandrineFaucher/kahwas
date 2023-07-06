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


                    <!-- Card header "Inscription"
                    ============================================================ -->
                    <div class="card-header">{{ __('Réinitialiser le mot de passe') }}</div>


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
                                    <button type="submit" class="btn btn-primary col-12"><small>{{ __('Envoyer le lien de réinitialisation du mot de passe') }}</small>
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

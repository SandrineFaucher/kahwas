@extends('layout.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <!-- si je suis connecté-->
                @if (session())
                    <!-- si la route précédente était login, donc si je viens de me connecter -->
                    @if (session()->get('_previous') && str_contains(session()->get('_previous')['url'], 'login'))
                        <p class="w-75 mx-auto text-center alert alert-success">Vous êtes connecté</p>
                    @endif
                @endif

            </div>
        </div>
    </div>
@endsection

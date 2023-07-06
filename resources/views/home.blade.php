@extends('layouts.app')

@section('content')

    <body>
        {{-- carrousel --}}
        {{-- <form action="" method="POST" enctype="multipart/form-data">"
            <div id="carousel≤≥Example" class="carousel slide p-5 mx-auto text-center">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div> --}}

        {{-- promos --}}
        <div class="container pt-5">
            <h1 class="p-5 mx-auto text-center">Promos</h1>

            {{-- @foreach ($articles as $articles)
                <div class="row-cols-md-3 g-4">
                    @csrf
                    <div class="col">
                        <div class="card shadow p-3 mb-5 bg-body-tertiary rounded-4">
                            src="{{ asset('images/' . $articles->image) }}"

                            <div class="card-body">
                                <h3 class="card-title">{{ $articles->nom }}</h3>
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="card-text">{{ $articles->description }}</p>
                                    </div>
                                    <div class="prix col text-center">
                                        <p>{{ $articles->prix }} €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach --}}

            {{-- Produits les mieux notés --}}

            <h1 class="p-2 mx-auto text-center">Produits les mieux notés</h1>

            <div class="row">
                @foreach ($articles as $article)
                    <div class="col-md-4">
                        <div class="card shadow p-3 mb-5 rounded-4">
                            <img class="rounded-1" src="{{ asset('images/' . $campagnes_articles->image) }}" alt="Image de l'article">

                            <div class="card-body">
                                <h3 class="card-title">{{ $campagnes_articles->nom }}</h3>
                                <div class="row">
                                    <div class="col-md-9">
                                        <p class="card-text">{{ $campagnes_articles->description }}</p>
                                    </div>
                                    <div class="col">
                                        <p>{{ $campagnes_articles->prix }} €</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </body>
@endsection

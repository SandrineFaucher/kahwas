@extends('layout.app')

@section('content')
    <h1 class="text-center"> BACK OFFICE </h1>


    <!--FORMULAIRE DE CREATION DES CAMPAGNES // SANDRINE -->
    <h4 class="text-center mt-5">Créer une campagne </h4>
    <div class="container-fluid p-5 col-md-10">
        <form action="{{ route('campagnes.store') }}" method="POST">
            @csrf

            <div class="row">

                <!--input nom-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nom</label>
                    <input type="text" class="form-control @error('nom') is-invalid" @enderror id="formGroupExampleInput2"
                        placeholder="Nom de la campagne" name="nom">
                </div>
                @error('nom')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--input réduction-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Réduction</label>
                    <input type="number"
                        class="form-control @error('reduction') is-invalid" @enderror  id="formGroupExampleInput2"
                        placeholder="réduction" name="reduction">
                </div>
                @error('reduction')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                <!--input date de début-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Date de début</label>
                    <input type="date"
                        class="form-control @error('date_debut') is-invalid" @enderror id="formGroupExampleInput2"
                        placeholder="Date de début" name="date_debut">
                </div>
                @error('date_debut')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <!--input date de fin-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Date de fin</label>
                    <input type="date"
                        class="form-control @error('date_fin') is-invalid" @enderror id="formGroupExampleInput2"
                        placeholder="Date de fin" name="date_fin">
                </div>
                @error('date_fin')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <!--affichage des produits à cocher-->
            <div class="row">


                @foreach ($articles as $article)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="flexCheckDefault"
                            name="articleId{{ $article->id }}">
                        <label class="form-check-label" for="flexCheckDefault">
                            {{ $article->nom }}
                        </label>
                    </div>
                @endforeach


                <div>
                    <button type="submit" class="btn btn-secondary">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--TABLEAU D'AFFICHAGE DES CAMPAGNES AVEC LES BOUTONS DE MODIFS/SUPPRESSION-->

    <h4 class="text-center mt-5">Liste des campagnes </h4>

    <div class="container-fluid p-5 col-md-10">

        <div class="row text-center">

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Réduction</th>
                        <th scope="col">Date de début</th>
                        <th scope="col">Date de fin</th>
                        <th scope="col">modifier</th>
                        <th scope="col">supprimer</th>
                    </tr>
                </thead>
                @foreach ($campagnes as $campagne)
                    <tbody>
                        <tr>
                            <th>{{ $campagne->nom }}</th>
                            <td>{{ $campagne->reduction }}</td>
                            <td>{{ $campagne->date_debut }}</td>
                            <td>{{ $campagne->date_fin }}</td>
                            <td>
                                <a href="{{ route('campagnes.edit', $campagne) }}">
                                    <button type="submit" class="btn btn-warning">
                                        Modifier
                                    </button>
                                </a>
                            </td>
                            <td>
                                <form action="{{ route('campagnes.destroy', $campagne) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">
                                        supprimer
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
            </table>

        </div>

    </div>







    <!-- SECTION CREATION ARTICLE // ALEXIS
        ============================================================ -->
    <div id="section_cration_article">
        <div class="container-fluid pt-5">
            <!-- Titre section -->
            <h2 class="text-center">Enregistrer un article</h2>
            <div class="row justify-content-center">
                <div class="col-md-5">


                    <!-- CARD
                        ============================================================ -->
                    <div class="card border-secondary text-light mt-1">


                        <!-- CARD HEADER
                            ============================================================ -->
                        <div class="card-header border-bottom border-secondary" id="header_card_index">
                            <small>{{ __('Enregistrer un article') }}</small></div>


                        <!-- CARD BODY
                            ============================================================ -->
                        <div class="card-body" id="body_card_index">


                            <!-- FORMULAIRE CREATION ARTICLE
                                ============================================================ -->
                            <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf


                                <!-- SECTION NOM + IMAGE
                                    ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- NOM
                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="nom"
                                            class="col-form-label ms-1"><small>{{ __('Nom') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="nom" type="text" placeholder="Nom"
                                                class="form-control @error('name') is-invalid @enderror" name="nom"
                                                value="{{ old('nom') }}" required>

                                            @error('nom')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- IMAGE
                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="image"
                                            class="col-md-4 col-form-label text-center text-light"><small>{{ __('image') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="image" type="file"
                                                class="form-control @error('image') is-invalid @enderror" name="image"
                                                placeholder="image.jpg" value="{{ old('image') }}" autocomplete="image"
                                                required>

                                            @error('image')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>


                                <!-- DESCRIPTION
                                    ============================================================ -->
                                <div class="col mb-3">
                                    <label for="description"
                                        class="col-form-label ms-1"><small>{{ __('Description') }}</small></label>

                                    <div class="col-md-12">
                                        <input id="description" type="text" placeholder="Description"
                                            class="form-control @error('descritpion') is-invalid @enderror"
                                            name="description" value="{{ old('description') }}" required>

                                        @error('descritpion')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- DESCRIPTION DETAILLEE
                                    ============================================================ -->
                                <div class="col mb-3">
                                    <label for="description_detaillee"
                                        class="col-form-label ms-1"><small>{{ __('Descritpion détaillée') }}</small></label>

                                    <div class="col-md-12">
                                        <textarea id="description_detaillee" type="text" placeholder="Description détaillée"
                                            class="form-control @error('description_detaillee') is-invalid @enderror" name="description_detaillee"
                                            value="{{ old('descritpion_detaillee') }}" required></textarea>

                                        @error('description_detaillee')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <!-- SECTION PRIX + STOCK
                                    ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- PRIX
                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="prix"
                                            class="col-form-label ms-1"><small>{{ __('Prix') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="prix" type="number" placeholder="Prix"
                                                class="form-control @error('prix') is-invalid @enderror" name="prix"
                                                value="{{ old('prix') }}" required>

                                            @error('prix')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- STOCK
                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="stock"
                                            class="col-form-label ms-1"><small>{{ __('Stock') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="stock" type="number" placeholder="Stock"
                                                class="form-control @error('stock') is-invalid @enderror" name="stock"
                                                value="{{ old('stock') }}" required>

                                            @error('stock')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                </div>


                                <!-- SECTION NOTE + GAMME
                                    ============================================================ -->
                                <div class="d-flex justify-content-center gap-2">


                                    <!-- NOTE
                                        ============================================================ -->
                                    <div class="col mb-3">
                                        <label for="note"
                                            class="col-form-label ms-1"><small>{{ __('Note') }}</small></label>

                                        <div class="col-md-12">
                                            <input id="note" type="number" placeholder="Note"
                                                class="form-control @error('note') is-invalid @enderror" name="note"
                                                value="{{ old('note') }}" required>

                                            @error('note')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>


                                    <!-- GAMME
                                        ============================================================ -->
                                    <div class="col mt-3">
                                        <label class="pb-2" for="gamme_id"></label>

                                        <div class="col-md-12 text-center">
                                            <select class="p-1" name="gamme_id" id="gamme_id">
                                                <option value="">--Choisissez une gamme--</option>
                                                @foreach ($gammes as $gamme)
                                                    <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>


                                </div>


                                <!-- BOUTTON VALIDATION ENREGISTREMENT
                                    ============================================================ -->
                                <div class="row mt-4">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn col-12 border-secondary"
                                            id="button_validation_enregistrement"><small
                                                class="text-light">{{ __('Enregistrer') }}</small></button>
                                    </div>
                                </div>

                            </form>
                        </div>

                    </div>

                </div>
            </div>
        </div>



        <!-- SECTION GESTION ARTICLES
            ============================================================ -->
        <!-- Titre section -->
        <h2 class="text-center mt-5">Gestion des articles</h2>
        <div class="container-fluid col-11 p-1 mt-2 border border-dark rounded justify-content-center"
            id="section_gestion_articles">
            <div class="row justify-content-center">
                <div class="col">


                    <!-- TABLE
                        ============================================================ -->
                    <div class="table-responsive border rounded p-2">
                        <table class="table border-dark">

                            <!-- TITRE DES COLONNES
                                ============================================================ -->
                            <thead>
                                <tr class="border-secondary">
                                    <!-- Nom -->
                                    <th scope="col">Nom</th>
                                    <!-- Description -->
                                    <th scope="col">Description</th>
                                    <!-- Image -->
                                    <th scope="col">Image</th>
                                    <!-- Prix -->
                                    <th scope="col">Prix</th>
                                    <!-- Stock -->
                                    <th scope="col">Stock</th>
                                    <!-- Note -->
                                    <th scope="col">Note</th>
                                    <!-- Boutton modifier -->
                                    <th scope="col">Modifier</th>
                                    <!-- Boutton Supprimer -->
                                    <th scope="col">Supprimer</th>
                                </tr>
                            </thead>

                            <!-- BOUCLE AFFICHAGE INFOS ARTICLES
                                ============================================================ -->
                            @foreach ($articles as $article)
                                <!-- ARTICLES
                                    ============================================================ -->
                                <tbody>
                                    <tr class="border-secondary">
                                        <!-- Nom -->
                                        <td class="border-end fs-5">{{ $article->nom }}</td>
                                        <!-- Description -->
                                        <td class="border-end">{{ $article->description }}</td>
                                        <!-- Image -->
                                        <td class="border-end text-center"><img
                                                src="{{ asset('images/' . $article->image) }}" class="rounded-top"
                                                alt="{{ $article->nom }}" style="width: 7rem"></td>
                                        <!-- Prix -->
                                        <td class="border-end fs-5 text-center">{{ $article->prix }} €</td>
                                        <!-- Stock -->
                                        <td class="border-end fs-5 text-center">{{ $article->stock }}</td>
                                        <!-- Note -->
                                        <td class="border-end fs-5 text-center">{{ $article->note }}</td>
                                        <!-- Boutton modifier -->
                                        <td>
                                            <a href="{{ route('articles.edit', $article) }}">
                                                <button type="button mx-auto" class="btn btn-outline-secondary text-light"
                                                    id="button_modif">Modifier</button>
                                            </a>
                                        </td>
                                        <!-- Boutton supprimer -->
                                        <td>
                                            <form action="{{ route('articles.destroy', $article) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger border-0">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>


<!-- SECTION CREATION GAMMES
        
@section('content')
    <h3 class="text-center mx-auto">
            Backoffice</h3>

        <div class="mx-auto text-center">
            <h3 class="pb-2">Créer une gamme</h3>
            <form class="p-3" action="{{ route('gammes.store') }}" method="POST">
                @csrf
                <!---Champs du formulaire -->
    <input type="text" name="nom" placeholder="Nom de la gamme">

    <!-- Bouton de soumission -->
    <button type="submit">Ajouter</button>
    </form>
    <div class="mx-auto text-center">

        <h3 class="p-2">Liste des gammes</h3>

        <div class="container">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Modifier</th>
                        <th scope="col">Supprimer</th>
                    </tr>
                </thead>

                <div class="form-group">


                    <tbody>
                        @foreach ($gammes as $gamme)
                            <tr>
                                <th scope="row">{{ $gamme->id }}</th>
                                <td>{{ $gamme->nom }}</td>

                                <td>
                                    <a href="{{ route('gammes.edit', $gamme) }}">
                                        <button class="style_button btn btn-primary rounded-pill m-1">Modifier</button>
                                    </a>
                                </td>

                                <td>
                                    <form action="{{ route('gammes.destroy', $gamme) }}" method="post">
                                        @method ("delete")
                                        @csrf
                                        <button type="submit"
                                            class="style_button btn btn-danger  rounded-pill  m-1">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </div>
            </table>
        </div>
    </div>
    </div>

<!-- Créer une gamme -->

<div class="container w-50 p-5" style="display:none" id="rangesForm">
    <h3>Créer une gamme</h3>
    <form method="post" action="{{ route('gammes.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">nom</label>
            <input required type="text" class="form-control" name="nom" placeholder="moulin à café" id="nom">
        </div>
        <button type="submit" class="btn btn-info text-light mt-4">Valider</button>
    </form>
</div>



<!-- Liste des gammes -->

<div class="container w-50 p-5" style="display:none" id="rangesList">
    <h3 class="mb-3">Liste des gammes</h3>

    <table class="table table-info">
        <thead class="thead-dark">
            <th>id</th>
            <th>nom</th>
            <th>modifier</th>
            <th>supprimer</th>
        </thead>
        @foreach ($gammes as $gamme)
            <tr>
                <td>{{ $gamme->id }}</td>
                <td>{{ $gamme->nom }}</td>
                <td><a href="{{ route('gammes.edit', $gamme) }}"><button
                            class="btn btn-warning">Modifier</button></a>
                </td>
                <td>
                    <form method="post" action="{{ route('gammes.destroy', $gamme) }}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection

@extends('layouts.app')

@section('content')
    <h1 class="text-center"> BACK OFFICE </h1>


    <!--FORMULAIRE DE CREATION DES CAMPAGNES-->
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
@endsection

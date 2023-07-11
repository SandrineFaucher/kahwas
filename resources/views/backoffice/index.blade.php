@extends('layouts.app')

@section('content')
    <h1 class="text-center"> BACK OFFICE </h1>


    <!--FORMULAIRE DE CREATION DES CAMPAGNES-->
    <h4 class="text-center mt-5">Créer une campagne </h4>
    <div class="container-fluid p-5 col-md-10">
        <form action="{{ route('campagnes.store', $campagne) }}" method="POST">
            @csrf
         
            <div class="row">

                <!--input nom-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                        placeholder="Another input placeholder" name="nom">
                </div>

                <!--input réduction-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Réduction</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                        placeholder="Another input placeholder" name="reduction">
                </div>

                <!--input date de début-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Date de début</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                        placeholder="Another input placeholder" name="date_debut">
                </div>

                <!--input date de fin-->
                <div class="mb-3">
                    <label for="formGroupExampleInput2" class="form-label">Date de fin</label>
                    <input type="text" class="form-control" id="formGroupExampleInput2"
                        placeholder="Another input placeholder" name="date_fin">
                </div>
            </div>

            <!--affichage des produits à cocher-->
            <div class="row">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                    <label class="form-check-label" for="flexCheckDefault" name="articles">
                        produits
                    </label>
                </div>
                <div>
                    <button type="submit" class="btn btn-secondary" name="campagne">
                        Envoyer
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!--TABLEAU D'AFFICHAGE DES CAMPAGNES AVEC LES BOUTONS DE MODIFS/SUPPRESSION-->

    <h4 class="text-center mt-5">Liste des campagnes </h4>

    <div class="container-fluid p-5 col-md-10">
        @foreach($campagnes as $campagne)
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
        <tbody>
          <tr>
            <th>{{$campagne->nom}}</th>
            <td>{{$campagne->reduction}}</td>
            <td>{{$campagne->date_debut}}</td>
            <td>{{$campagne->date_fin}}</td>
            <td>
                <button type="button" class="btn btn-warning">
                    Modifier
                </button>
            </td>
            <td>
                <button type="button" class="btn btn-danger">
                    supprimer
                </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
      @endforeach
    </div>
    
@endsection

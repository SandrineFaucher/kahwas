@extends('layout.app')

@section('content')

<!--FORMULAIRE DE CREATION DES CAMPAGNES-->
<h4 class="text-center mt-5">Modifier une campagne </h4>
<div class="container-fluid p-5 col-md-10">
    <form action="{{route('campagnes.update', $campagne) }}" method="POST">
        @csrf
        @method('PUT')
     
        <div class="row">

            <!--input nom-->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Nom</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                     name="nom" value="{{$campagne->nom}}">
            </div>

            <!--input réduction-->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Réduction</label>
                <input type="text" class="form-control" id="formGroupExampleInput2"
                     name="reduction" value="{{$campagne->reduction}}">
            </div>

            <!--input date de début-->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="formGroupExampleInput2"
                     name="date_debut" value="{{$campagne->date_debut}}">
            </div>

            <!--input date de fin-->
            <div class="mb-3">
                <label for="formGroupExampleInput2" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="formGroupExampleInput2"
                     name="date_fin" value="{{$campagne->date_fin}}">
            </div>
        </div>

        <!--affichage des produits à cocher-->
        <div class="row">
            @foreach($articles as $article)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  id="flexCheckDefault" name="articleId{{$article->id}}" value="{{$article->id}}" id="article{{$article->id}}"
                    @if($article->campagnes()->where('campagne_id', $campagne->id)->exists()) checked @endif >
                    <label class="form-check-label" for="flexCheckDefault" >
                       {{$article->nom}}
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

@endsection


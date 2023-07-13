@extends('layout.app')

@section('title')
    Backoffice - kahwas
@endsection


@section('content')
    <h1 class="text-center mx-auto">
        Backoffice</h1>

    <div class="mx-auto text-center">
        <h3 class="pb-2">Créer une gamme</h3>
        <form class="p-3" action="{{ route('gammes.store') }}" method="POST">
            @csrf
            <!-- Champs du formulaire -->
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
@endsection

<!-- Créer une gamme -->

<div class="container w-50 p-5" style="display:none" id="rangesForm">
    <h3>Créer une gamme</h3>
    <form method="post" action="{{ route('gammes.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">nom</label>
            <input required type="text" class="form-control" name="nom" value="" id="nom">
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
                <td><a href="{{ route('gammes.edit', $gamme) }}"><button class="btn btn-warning">Modifier</button></a>
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

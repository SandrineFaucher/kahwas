@extends('layouts.app')

@section('title')
    Backoffice - kahwas
@endsection


@section('content')
    <h1 class="text-center mx-auto">
        Backoffice</h1>

    <div class="mx-auto text-center">
        <h3 class="pb-2">Créer une gamme</h3>
        <textarea id="story" name="story" rows="5" cols="33"></textarea>
        <button type="submit" class="btn btn-danger text-light mt-4 text-center mb-5">Valider</button>
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
                                        @can('update', $gamme)
                                            <form href="{{ route('comments.edit', $gamme) }}">
                                                <button class="style_button btn btn-primary rounded-pill m-1">modifier</button>
                                            </form>
                                        @endcan
                                    </td>


                                    <td>
                                        @can('delete', $gamme)
                                            <form action="{{ route('gamme.destroy', $gamme) }}" method="post">
                                                @method ("delete")
                                                @csrf
                                                <button type="submit"
                                                    class="style_button btn btn-danger  rounded-pill  m-1">Supprimer</button>
                                            </form>
                                        @endcan
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

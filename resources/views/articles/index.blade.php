{{-- @extends('layouts.app')

@section('title')
    Modifier article {{ $article->nom }}
@endsection

@section('content')
    @foreach ($gammes as $gamme)
        <option value="{{ $gamme->id }}">{{ $gamme->nom }}</option>
    @endforeach
    <input type="hidden" name="gamme_id" value="{{ $article->gamme_id }}">
    <button type="submit" class="btn btn-info text-light mt-4">Valider</button>

    <div class="card" style="width: 18rem;">
        <form method="post" action="{{ route('articles', $article) }}" id="articleEditForm">
            <label for="image">image</label>
            <input required type="text" class="form-control" name="image" value="{{ $article->image }}" <div
                class="card-body">
            <label for="nom">nom</label>
            <input required type="text" class="form-control" name="nom" value="{{ $article->nom }}">
            <p class="card-text">
                <label for="description">description</label>
                <input required type="text" class="form-control" name="description" value="{{ $article->description }}">
            </p>
            <div class="form-group">
                <label for="stock">stock</label>
                <input required type="text" class="form-control" name="stock" value="{{ $article->stock }}"
                    id="stock">
            </div>
            <div class="form-group">
                <label for="prix">prix</label>
                <input required type="text" class="form-control" name="prix" value="{{ $article->prix }}"
                    id="prix">
            </div>
        </form>
    </div>
@endsection --}}

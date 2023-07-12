@extends ('layouts.app')

@section('title')
    {{ $article->nom }} - Kahwas
@endsection

@section('content')
    <h1 class="text-center m-5"> {{ $article->nom }}</h1>

    <div class="container mb-3">
        <div class="row justify-content-center">
            <div class="container-fluid text-center p-3">
                <div class="col">
                    <img src="{{ asset("images/$article->image") }} " style="width: 20vw; height:20vw" alt="imageArticle">
                </div>
            </div>


            <!-- =============================================== card description article ========================================== -->

            <div class="card">

                <div class="text-center m-2">
                    <td>{{ $article->description }}</td>
                </div>
                <div class="text-center m-2">
                    <td> {{ $article->description_detaillee }}</td>
                </div>


                <!--  PRIX = si la clé campagne existe pour cet article, j'affiche le nom de la promo + % réduction + prix barré + prix promo -->

                <div class="text-center m-5 fs-5">
                    @foreach ($article->campagnes as $campagne)
                        @if (isset($campagne))
                            <span>{{ $campagne->nom }} :
                                -{{ $campagne->reduction }}%</span>
                                <del>{{ $article['prix'] }} €</del>
                                @php $prixremise = $article['prix']- ($article['prix'] * $campagne->reduction / 100)@endphp
                                <span>{{ number_format($prixremise, 2, ',', ' ') }}€</span>
                            
                        @else
                            <td>{{ $article['prix'] }} €</td>
                        @endif
                    @endforeach
                </div>


                <!-- =================================== Champ quantité + bouton Ajouter au panier =================================== -->

                <form method="POST" action="{{ route('panier.add', 1) }}"
                    class="form-inline d-inline-block d-flex justify-content-center">
                    {{ csrf_field() }}
                    <div class="row w-25 ">
                        <input type="number" name="quantite" placeholder="Quantité ?" class="form-control m-2">
                        {{-- value="{{ isset(session('panier')[$article->id]) ? session('panier')[$article->id]['quantite'] : null }}"> --}}
                        {{-- <!-- value = afficher la quantité du produit s'il se trouve au panier--> --}}

                        <button type="submit" class="ajoutValider btn m-2">+ Ajouter au panier</button>
                    </div>

                </form>



                <!-- ===== Je fais apparaitre le titre + le commentaire s'il y a déjà au moins 1 avois pour cet article ======== -->

                @foreach ($article->avis as $avis)
                    <h5 class="text-center m-5">Avis sur ce produit</h5>
                    <p>{{ $avis->commentaire }}</p>
                @endforeach


            </div>

        </div>
    @endsection

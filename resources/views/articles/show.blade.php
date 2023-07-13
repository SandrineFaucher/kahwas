@extends ('layouts.app')

@section('title')
    {{ $article->nom }} - Kahwas
@endsection

@section('content')
    <h1 class="text-center m-5"> {{ $article->nom }}</h1>

    <div class="container mb-3">
        <div class="row">
           
                <div class="col-xl-6 d-flex justify-content-center">
                    <img src="{{ asset("images/$article->image") }} " style="width:35vw" alt="imageArticle">
                </div>
            


            <!-- =============================================== card description article ============================================= -->
            <div class="col-xl-6 d-flex justify-content-center mt-5">
                <div class="card">

                    <div class="text-center m-2">
                        <td>{{ $article->description }}</td>
                    </div>
                    <div class="text-center m-2">
                        <td> {{ $article->description_detaillee }}</td>
                    </div>


                    <!--  PRIX = si la clé campagne existe pour cet article, j'affiche le nom de la promo + % réduction + prix barré + prix promo -->

                    <div class="text-center m-5 fs-5">

                        @if ($article->campagne)
                            <span>{{ $article->campagne->nom }} :
                                -{{ $article->campagne->reduction }}%</span>
                            <del>{{ $article['prix'] }} €</del>
                            @php $prixremise = $article['prix']- ($article['prix'] * $article->campagne->reduction / 100)@endphp
                            <span>{{ number_format($prixremise, 2, ',', ' ') }}€</span>
                        @else
                            <td>{{ $article['prix'] }} €</td>
                        @endif

                    </div>


                    <!-- =================================== Champ quantité + bouton Ajouter au panier =================================== -->

                    <form method="POST" action="{{ route('panier.add', $article->id) }}"
                        class="form-inline d-inline-block d-flex justify-content-center">
                        {{ csrf_field() }}
                        <div class="row w-25 ">
                            <input type="number" min="1" max="10" name="quantite" placeholder="Quantité ?"
                                class="form-control m-2">

                            <button type="submit" class="ajoutValider btn m-2">+ Ajouter au panier</button>
                        </div>

                    </form>



                    <!-- ==================================== Je fais apparaitre les avis pour cet article ============================== -->

                    <h3 class="text-center mt-5">Notes et avis sur ce produit</h3>

                    @if (count($article->avis) == 0)
                        <p class="text-center m-5">Pas d'avis pour cet article</p>
                    @else(isset($article->avis) && $article->avis !== null)
                        @foreach ($article->avis as $avis)
                            <p class="mt-5 fw-bold">Note : {{ $avis->note }}/5</p>
                            <p>{{ $avis->commentaire }}</p>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    @endsection

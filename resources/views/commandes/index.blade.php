@extends('layouts.app')

@section('content')

<h1 class="text-center"> Mes commandes </h1>



<div class="container-fluid p-5">
@foreach($user->commandes as $commande)
<div class="row">
   <table class=" table table-bordered  p-5">
    <thead class="text-center">
      <tr>
        <th scope="col">Numéro</th>
        <th scope="col">Prix</th>
        <th scope="col">Date</th>
        <th scope="col">Détails</th>
      </tr>
    </thead>
    <tbody class="text-center">
      <tr>
        <th scope="row">{{$commande->numero}}</th>
        <td>{{$commande->prix}} €</td>
        <td>{{date('d/m/y', strtotime($commande->created_at))}}</td>
        <td><a href="{{route('commandes.show', $commande)}}">Détail </a></td>
      </tr>
    </table>
  </div>
  @endforeach
</div>


@endsection
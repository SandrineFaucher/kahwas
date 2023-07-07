@extends('layouts.app')

@section('content')

<h1> Mes commandes </h1>

@foreach($commandes as $commande)

<table class="table">
    <thead>
      <tr>
        <th scope="col">Numéro de Commandes</th>
        <th scope="col">Date de la création</th>
        <th scope="col">Adresse de livraison</th>
        <th scope="col">Adresse de facturation</th>
        
        <th scope="col">Détail de la commande</th>

      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>


@foreach



@endsection
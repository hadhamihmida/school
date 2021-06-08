@extends('layouts.master') 

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-secondary" href="{{ route('seance.create') }}"> Ajoute seance </a>
            </div>
        </div>
    </div>
   
<div class="push-top">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table">
    <thead>
        <tr class="table-light">
          <td>ID</td>
          <td>Jour</td>
          <td>Date_debut</td>
          <td>Date_fin</td>
          <td>Profs</td>
          <td>Classe</td>
          <td>Annee</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($seances as $seance)
        <tr>
            <td>{{$seance->id}}</td>
            <td>{{$seance->jour}}</td>
            <td>{{$seance->heure_debut}}</td>
            <td>{{$seance->heure_fin}}</td>
            <td> {{$seance->prof->nom.$seance->prof->prenom}}</td>
            <td> {{$seance->classe->numérotation}}</td>
            <td> {{$seance->classe->annee->nom}}
            <td class="text-center">
                <form action="{{ route('seance.destroy', $seance->id) }}" method="post" style="display: inline-block">
                
                <a href="{{ route('seance.edit', $seance->id)}}" class="btn btn-primary btn-sm">Modifier</a> 

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning btn-sm delete" type="submit">Supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection
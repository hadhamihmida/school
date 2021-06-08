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
                <a class="btn btn-secondray" href="{{ route('examen.create') }}"> Listes des examens</a>
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
          <td>Annee</td>
          <td>Classe</td>
          <td>Matiere</td>
          <td>Date</td>

          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($examens as $examen)
        <tr>
             <td>{{$examen->id}}</td>
            <td>{{$examen->classe->annee->nom}}</td>
            <td>{{$examen->classe->numérotation}}</td>
            <td>{{$examen->matiere->nom}}</td>
            <td>{{$examen->date}}</td>

            <td class="text-center">
                <form action="{{ route('examen.destroy', $examen->id)}}" method="post" style="display: inline-block">
              
                <a href="{{ route('examen.edit', $examen->id)}}" class="btn btn-primary btn-sm">Modifier</a>

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
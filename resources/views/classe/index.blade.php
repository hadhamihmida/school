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
                <a class="btn btn-success" href="{{ route('classe.create') }}"> Ajouter un classe</a>
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
        <tr class="table-warning">
          <td>ID</td>
          <td>Capaciter</td>
          <td>Numérotation</td>
          <td>Anneé</td>
         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($classe as $classe)
        <tr>
            <td>{{$classe->id}}</td>
            <td>{{$classe->capaciter}}</td>
            <td>{{$classe->numérotation}}</td>
            <td>{{ $classe->annee->nom}}</td>

            <td class="text-center">
                <form action="{{ route('classe.destroy', $classe->id)}}" method="post" style="display: inline-block">
              
                <a href="{{ route('classe.edit', $classe->id)}}" class="btn btn-primary btn-sm">Modifier</a>

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm delete" type="submit">Supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection
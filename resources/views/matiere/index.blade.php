
<!-- extend the master.blade.php in layouts folder.  -->
@extends('layouts.master') 

@section('content')

<style>
  .push-top {
    margin-top: 50px;
  }
</style>
<div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="end">
                <a class="btn btn-secondary float-right btn-sm" href="{{ route('matiere.create') }}"><i class="fa fa-list"></i> Ajoute matiere</a>
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
          <td>Nom</td>
          <td>Nombre</td>
          <td>Niveau</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($matieres as $matiere)
        <tr>
            <td>{{$matiere->id}}</td>
            <td>{{$matiere->nom}}</td>
            <td>{{$matiere->nombre}}</td>
            <td> {{  $matiere->annee->nom}}</td>
            <td class="text-center">
                <form action="{{ route('matiere.destroy', $matiere->id) }}" method="post" style="display: inline-block">
    
                
                <a href="{{ route('matiere.edit', $matiere->id)}}" class="btn btn-primary btn-sm">Modifier</a> 

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning btn-sm delete"  type="submit">Supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
      {{$matieres->links('pagination.input')}}
<div>

@endsection
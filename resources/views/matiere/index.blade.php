
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
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('matiere.create') }}"> Create New Product</a>
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
          <td>Nom</td>
          <td>professeurs</td>
          <td>Niveau</td>
          <td>Nombre</td>
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($matiere as $matiere)
        <tr>
            <td>{{$matiere->id}}</td>
            <td>{{$matiere->nom}}</td>
            <td>{{$matiere->professeur}}</td>
            <td>{{$matiere->niveau}}</td>
            <td>{{$matiere->nombre}}</td>
            <td class="text-center">
                <form action="{{ route('matiere.destroy', $matiere->id) }}" method="post" style="display: inline-block">
                
                <a href="{{ route('matiere.edit', $matiere->id)}}" class="btn btn-primary btn-sm">Modifier</a> 

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" type="submit">Supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>

@endsection
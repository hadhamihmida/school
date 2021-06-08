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
                <a class="btn btn-secondary" href="{{ route('annee.create') }}"> Ajoute classe</a>
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
         
          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($annees as $annee)
        <tr>
            <td>{{$annee->id}}</td>
            <td>{{$annee->nom}}</td>
           
            <td class="text-center">
                <form action="{{ route('annee.destroy', $annee->id)}}" method="post" style="display: inline-block">
              
                <a href="{{ route('annee.edit', $annee->id)}}" class="btn btn-primary btn-sm">Modifier</a>

                    @csrf
                    @method('DELETE')
                    <button class="btn btn-warning btn-sm delete" type="submit">Supprimer</button>
                  </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
        {{$annees->links('pagination.input')}}
<div>

@endsection
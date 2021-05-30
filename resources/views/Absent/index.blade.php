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
                <a class="btn btn-success" href="{{ route('profsabsents') }}"> Listes des absents</a>
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
          <td>Matiere</td>
          <td>date</td>

          <td class="text-center">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($absents as $absent)
        <tr>
        <td>{{$absent->prof->id}}</td>
            <td>{{$absent->prof->nom.$absent->prof->prenom}}</td>
            <td>{{$absent->matiere->nom}}</td>
            <td>{{$absent->date}}</td>

            <td class="text-center">
                <form action="{{ route('absent.destroy', $absent->id)}}" method="post" style="display: inline-block">
              
                <a href="{{ route('absent.edit', $absent->id)}}" class="btn btn-primary btn-sm">Modifier</a>

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
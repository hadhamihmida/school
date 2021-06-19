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
                <a class="btn btn-secondary float-right btn-sm" href="{{ route('profsabsents') }}"><i class="fa fa-list"></i> Listes des absents</a>
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
          <td>Matière</td>
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
                    <button class="btn btn-warning btn-sm delete" type="submit">Supprimer</button>
                  </form>
            </td>
          
        </tr>
        @endforeach
    </tbody>
  </table>
      {{$absents->links('pagination.input')}}
<div>

@endsection
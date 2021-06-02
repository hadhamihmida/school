@extends('layouts.master') 

@section('content')

<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>

<div class="card push-top">
  <div class="card-header">
    Identifier classe
  </div>

  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
    <h3>{{$seance->heure_debut}} - {{$seance->heure_fin}}</h3>
   
    <h3>prof : {{$seance->prof->nom}}</h3>
    <h3>matiere : {{$seance->prof->matiere->nom}}</h3>
    
      <form method="post" action="{{route('absent_prof.create',$seance->id)}}">
          <div class="form-group">
              @csrf
             
              <label for="capaciter">Date</label>
              <input type="date" class="form-control" name="date"/>
          </div>

          <div class="form-group">
          <label for="present">present
          </label>
          <input type="radio" id="present" name="status" value="0">
          </div>
          <div class="form-group">
          <label for="absent">absent
          </label>
          <input type="radio" id="absent" name="status" value="1">
          </div>

         
          <input type="hidden" name="seance_id" value="{{$seance->id}}">

        <input type="hidden" name="profs_id" value="{{$seance->prof->id}}">

       <input type="hidden" name="matiere_id" value="{{$seance->prof->matiere->id}}">

       
          <button type="submit" class="btn btn-block btn-danger">Enregistrer</button>

      </form>
  </div>
</div>
@endsection
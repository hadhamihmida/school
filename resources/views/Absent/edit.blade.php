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
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Modifier les absences</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('temps.index') }}"> Retour</a>
            </div>
        </div>
    </div>

<div class="card push-top">
  

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
      <form method="post" action="{{ route('absent.update', $absent->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $absent->prof->nom.$absent->prof->prenom}}"/>
          </div>
          <div class="form-group">
              <label for="matiere">Matière</label>
              <input type="string" class="form-control" name="matiere" value="{{ $absent->matiere->nom }}"/>
          </div>
          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" value="{{ $absent->date}}"/>
          </div>
         
         
         
          <button type="submit" class="btn btn-block btn-danger">mettre à jour</button>
      </form>
  </div>
 
</div>
@endsection
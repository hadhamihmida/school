
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
                <h2>Modifier les Niveaux</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('annee.index') }}"> Retour</a>
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
      <form method="post" action="{{ route('annee.update', $annee->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="capaciter">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $annee->nom}}"/>
          </div>
         
         
         
          <button type="submit" class="btn btn-block btn-danger">mettre à jour</button>
      </form>
  </div>
</div>
@endsection
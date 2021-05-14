
@extends('layouts.master') 

@section('content')



<div class="card push-top">
  <div class="card-header">
    Ajoute Matiéres
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
      <form method="post" action="{{ route('matiere.store') }}">
          <div class="form-group">
              @csrf
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom"/>
          </div>
          <div class="form-group">
              <label for="professeur">professeur</label>
              <input type="text" class="form-control" name="professeur"/>
          </div>
          <div class="form-group">
              <label for="niveau">Niveau</label>
              <input type="int" class="form-control" name="niveau"/>
          </div>
          <div class="form-group">
              <label for="nombre">nombre</label>
              <input type="int" class="form-control" name="nombre"/>
          </div>
          <button type="submit" class="btn btn-block btn-danger">Enregistrer</button>
      </form>
  </div>
</div>
@endsection
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
    Identifier Année
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
      <form method="post" action="{{ route('annee.store') }}">
          <div class="form-group">
              @csrf
              <label for="capaciter">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{old('nom')}}"/>
              @error('nom')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
          </div>
         
          
          <button type="submit" class="btn btn-block btn-danger">Enregistrer</button>
      </form>
  </div>
</div>
@endsection
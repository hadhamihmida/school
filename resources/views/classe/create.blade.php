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
      <form method="post" action="{{ route('classe.store') }}">
          <div class="form-group">
              @csrf
              <label for="capaciter">Capaciter</label>
              <input type="int" class="form-control" name="capaciter" value="{{old('capaciter')}}"/>
              @error('capaciter')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
          </div>
          <div class="form-group">
              <label for="numérotation">Numérotation</label>
              <input type="int" class="form-control" name="numérotation" value="{{old('numérotation')}}"/>
              @error('numérotation')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
          </div>

          <div class="form-group col-md-4">
        <select class="form-control" name="annee_id" value="{{old('annee_id')}}">
         @foreach($annees as $annee)
         <option value="{{ $annee->id  }}">
          {{$annee->nom}}
         </option>
         @endforeach
        </select>
        @error('annee_id')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
    </div>


          
          <button type="submit" class="btn btn-block btn-danger">Enregistrer</button>
      </form>
  </div>
</div>
@endsection
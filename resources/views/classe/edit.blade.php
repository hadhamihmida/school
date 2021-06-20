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
                <h2>Modifier information</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classe.index') }}"> Retour</a>
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
      <form method="post" action="{{ route('classe.update', $classe->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="capaciter">Capaciter</label>
              <input type="int" class="form-control" name="capaciter" value="{{ $classe->capaciter}}"/>
          </div>
          <div class="form-group">
              <label for="numérotation">Numérotation</label>
              <input type="int" class="form-control" name="numérotation" value="{{ $classe->numérotation }}"/>
          </div>

          <div class="form-group col-md-4">
        <select class="form-control" name="annee_id">
        <option value="" >Select</option>
      
         @foreach($annees as $annee)
         <option value="{{ $annee->id  }}" {{$classe->annee_id == $annee->id ? 'selected':''}}>
          {{$annee->nom}}
         </option>
         @endforeach
        </select>


    </div>




         
          <button type="submit" class="btn btn-block btn-danger">mettre à jour</button>
      </form>
  </div>
</div>
@endsection
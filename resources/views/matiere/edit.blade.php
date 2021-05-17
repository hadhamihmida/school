
@extends('matiere.layout')

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
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('matiere.index') }}"> Retour</a>
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
      <form method="post" action="{{ route('matiere.update', $matiere->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nom">Nom</label>
              <input type="text" class="form-control" name="nom" value="{{ $matiere->nom }}"/>
          </div>
        
          <div class="form-group">
              <label for="nombre">Nombre_professeur</label>
              <input type="int" class="form-control" name="nombre" value="{{ $matiere->nombre }}"/>
          </div>

          <div class="form-group col-md-4">
        <select class="form-control" name="annee_id">
        <option value="" >Select</option>
      
         @foreach($annees as $annee)
         <option value="{{ $annee->id  }}" {{$matiere->annee_id == $annee->id ? 'selected':''}}>
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
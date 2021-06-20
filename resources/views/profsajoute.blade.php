@extends('layouts.master')
@section('content')
<div class="card-body">

  <section class="col-md-11">
    <div class="card">
      <div class="card-header">
        <h3> Insert vos Information </h3>
      </div>
    </div>
    <div>
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    </div>
    <div class="card-body">
      <form methode="post" action="{{ (@$editData)?route('update.profs', @$editData->id): route('store.profs') }}" enctype="multipart/from-data">
        @csrf
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text" name="nom" value="{{ (@$editData->nom) }}" class="form-control" placeholder="Nom">
          </div>
          <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text" name="prenom" value="{{ (@$editData->prenom) }}" class="form-control" placeholder="Prenom">
          </div>
        </div>
        
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="inputCin">Cin</label>
            <input type="int" name="cin" value="{{ (@$editData->cin) }}" class="form-control" placeholder="Cin">
          </div>
          <div class="form-group col-md-6">
            <label for="inputDate_Naissance">Date_Naissance</label>
            <input type="date" name="date_naissance" value="{{ (@$editData->date_naissance) }}" class="form-control" placeholder="Date_Naissance">
          </div>
        </div>
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="inputEmail">Email</label>
          <input type="email" name="email" value="{{ (@$editData->email) }}" class="form-control" placeholder="Email">
        </div>
        <div class="form-group col-md-6">
          <label for="inputAdresse">Adresse</label>
          <input type="text" name="adresse" value="{{ (@$editData->adresse) }}" class="form-control" placeholder="Adresse">
        </div>
        </div>

      <div class="form-row">

        <div class="form-group col-md-6">
          <label for="inputTel">Tel</label>
          <input type="int" name="tel" value="{{ (@$editData->tel) }}" class="form-control" placeholder="Tel">
        </div>

        <div class="form-group col-md-4">
        <select class="form-control" id="matiere_id" name="matiere_id">
        <option value="">Spécialité</option>
         @foreach($matieres as $matiere)
         <option value="{{ $matiere->id }}" {{ (@$editData->matiere_id)==$matiere->id ? 'selected': ''}}>
          {{$matiere->nom }}
         </option>
         @endforeach
        </select>
    </div>
      
     </div>
        <div class="form-group col-md-4">
          <label for="inputExperience">Experience</label>
          <input type="int" name="experience" value="{{ (@$editData->experience) }}" class="form-control" placeholder="Experiences">
        </div>
        </div>
   
    <button type="submit" class="btn btn-primary">{{ (@$editData)? 'update':'Enregistrer' }}</button>
    </form>
    </div>
</div>


@endsection
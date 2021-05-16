@extends('layouts.master')
@section('content')
    <div class="card-body">

        <section class="col-md-11">
            <div class="card">
                <div class="card-header">
                    <h3> Insert vos Information </h3>
                </div>
             </div>

            <div class="card-body">
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">{{$error}}</div>
                    @endforeach
                @endif
                <form method="post" action="{{ (@$editData)?route('update.Parent', $editData->id): route('store.Parent') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                        <label for="inputNom">Nom</label>
                        <input type="text"  name="nom_pr"  value="{{ (@$editData->nom_pr) }}" class="form-control"  placeholder="Entrer Nom de parent">
                   </div>
                        <div class="form-group col-md-6">
                        <label for="inputPrenom">Prenom</label>
                        <input type="text"  name="prenom_pr"  value="{{ (@$editData->prenom_pr) }}"     class="form-control"  placeholder="entrer prenom de parent">
                     </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputEmail">Email</label>
                        <input type="email" name="email"   value="{{ (@$editData->email) }}"     class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputcin">Cin</label>
                        <input type="int"  name="cin"  value="{{ (@$editData->cin) }}"       class="form-control"  placeholder="Cin">
                    </div>
                     <div class="form-group col-md-6">
                         <label for="inputTel">Tel</label>
                        <input type="int" name="tel"  value="{{ (@$editData->tel) }}"       class="form-control" placeholder="Tel">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputTel">Adresse</label>
                        <input type="text" name="adresse"  value="{{ (@$editData->adresse) }}"       class="form-control" placeholder="adresse">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputnombre">nombre</label>
                        <input type="int"  name="nombre"  value="{{ (@$editData->nombre) }}"    class="form-control"  placeholder="ajouter nomber des enfants" >
                    </div>
                    <button type="submit" class="btn btn-primary">{{ (@$editData)? 'update':'Enregistrer' }}</button>
                </form>
            </div>
        </section>
    </div>

@endsection

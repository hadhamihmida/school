@extends('classe.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Affiche listes des  classes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('classe.index') }}"> Retour</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $annee->nom }}
            </div>
        </div>
       
       
    </div>
@endsection
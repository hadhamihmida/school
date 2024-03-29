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
                <h2>Modifier Séance</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('seance.index') }}"> Retour</a>
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
      <form method="post" action="{{ route('seance.update', $seance->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="jour">Jour</label>
              <input type="text" class="form-control" name="jour" value="{{ $seance->jour }}"/>

          </div>


          <div class="form-group row">
         <label for="example-time-input" class="col-2 col-form-label">Heure_debut</label>
           <div class="col-10">
             <input class="form-control" type="time" value="{{ $seance->heure_debut}}" id="example-time-input">
          </div>
       </div>



       <div class="form-group row">
         <label for="example-time-input" class="col-2 col-form-label">Heure_fin</label>
           <div class="col-10">
             <input class="form-control" type="time" value="{{$seance->heure_fin}}" id="example-time-input">
          </div>
       </div>
          <div class="form-group col-md-4">
              <select class="form-control" id="matiere_id" name="matiere_id">
                  <option value="">Spécialité</option>
                  @foreach($matieres as $matiere)
                      <option value="{{ $matiere->id }}" {{ ($seance->matiere_id)==$matiere->id ? 'selected': ''}}>
                          {{$matiere->nom .' ' . $matiere->annee->nom }}
                      </option>
                  @endforeach
              </select>
          </div>


          <div class="form-group col-md-4">
              <select class="form-control" id="profs_id" name="profs_id">
                  <option value="">Select profs</option>
                  @foreach($profs as $prof)
                      <option value="{{ $prof->id}}" {{$seance->profs_id == $prof->id ? 'selected' : ''}}>
                          {{$prof->nom .' ' . $prof->prenom .' '.$prof->matiere->nom}}
                      </option>
                  @endforeach
              </select>
          </div>
       <div class="form-group col-md-4">
        <select class="form-control" id="annee_id" name="annee_id">
        <option value="">Selecte Année</option>
         @foreach($Annees as $annee)
         <option value="{{ $annee->id}}"   {{ ($seance->classe->annee_id)==$annee->id ? 'selected': ''}} >
          {{$annee->nom }}
         </option>
         @endforeach
        </select>
    </div>


      <div class="form-group col-md-4">
          <select class="form-control" id="classe_id" name="classe_id">
              <option value="">Selecte Classe</option>
          </select>
      </div>

          <button type="submit" class="btn btn-block btn-danger">mettre à jour</button>
      </form>
  </div>
</div>
@endsection


@section('scripts')
<script>
        $(function (){
            $('body').on('change','#annee_id',function(e){
                var annee_id = e.target.value;
                $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/classes`,
                    success:function (data){
                       $('#classe_id').html(`<option value="">Select 2 Classe</option>`);
                       data.forEach(function (value,index){
                            $('#classe_id').append(`
                                <option value="${value.id}">${value.numérotation}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            });
            @if(($seance->classe_id)!=null)
            var annee_id=$('#annee_id').val();
            console.log(annee_id);
            var classe_id = '{{($seance->classe_id)}}';
            $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/classes`,
                    success:function (data){
                      console.log(data);
                       $('#classe_id').html(`<option value="">Select 2 Classe</option>`);
                       data.forEach(function (value,index){
                            $('#classe_id').append(`
                                <option value="${value.id}" ${value.id == classe_id ? 'selected' : '    '}>${value.numérotation}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            @endif
        })

    </script>
    @endsection

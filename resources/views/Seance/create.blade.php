@extends('layouts.master')

@section('content')



<div class="card push-top">
  <div class="card-header">
    Identifier séance
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
      <form method="post" action="{{ route('seance.store') }}">
          <div class="form-group">
              @csrf
              <select name="jour"  class="custom-select custom-select-lg mb-3" value="{{old('jour')}}">
  <option selected> jour </option>
  <option value="1">Lundi</option>
  <option value="2">Mardi</option>
  <option value="3">Mercredi</option>
  <option value="4">Jeudi</option>
  <option value="5">Vendredi</option>
  <option value="6">Samedi</option>

</select>
@error('jour')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
          </div>

          <div class="form-group row">
            <label for="example-time-input" class="col-2 col-form-label">Heure_debut</label>
              <div class="col-10">
               <input class="form-control" type="time" name="heure_debut"  id="example-time-input">
             </div>
         </div>

         <div class="form-group row">
         <label for="example-time-input" class="col-2 col-form-label">Heure_fin</label>
           <div class="col-10">
             <input class="form-control" type="time" name="heure_fin"  id="example-time-input">
          </div>
       </div>
          <div class="form-group col-md-4">
              <select class="form-control" id="matiere_id" name="matiere_id">
                  <option value="">Spécialité</option>
                  @foreach($matieres as $matiere)
                      <option value="{{ $matiere->id }}" {{ (@$editData->matiere_id)==$matiere->id ? 'selected': ''}}>
                          {{$matiere->nom .' ' . $matiere->annee->nom }}
                      </option>
                  @endforeach
              </select>
          </div>


    <div class="form-group col-md-4">
        <select class="form-control" id="profs_id" name="profs_id">
        <option value="">Select profs</option>
         @foreach($profs as $prof)
         <option value="{{ $prof->id}}" >
         {{$prof->nom .' ' . $prof->prenom .' '.$prof->matiere->nom}}
         </option>
         @endforeach
        </select>
    </div>

    <div class="form-group col-md-4">
        <select class="form-control" id="annee_id" name="annee_id">
        <option value="">Selecte Année</option>
         @foreach($Annees as $annee)
         <option value="{{ $annee->id}}"   {{ (@$editData->classe->annee_id)==$annee->id ? 'selected': ''}} >
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

      <button type="submit" class="btn btn-block btn-danger">Enregistrer</button>
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
                       console.log(data)
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
            @if((@$editData->classe_id)!=null)
            var annee_id=$('#annee_id').val();
            var classe_id = '{{(@$editData->classe_id)}}';
            $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/classes`,
                    success:function (data){
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

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
                <a class="btn btn-primary" href="{{ route('examen.index') }}"> Retour</a>
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
      <form method="post" action="{{ route('examen.update', $examen->id) }}">
        @csrf
        {{method_field('PUT')}}
        
       <div class="form-group">
              <label for="date">Date</label>
              <input type="date" class="form-control" name="date" value="{{ $examen->date}}"/>
          </div>
       <div class="form-group col-md-4">
        <select class="form-control" id="annee_id" name="annee_id">
        <option value="">Selecte Année</option>
         @foreach($annees as $annee)
         <option value="{{ $annee->id}}" {{$examen->classe->annee_id == $annee->id ? "selected" : ""}}>
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
      <div class="form-group col-md-4">
        <select class="form-control" id="matiere_id" name="matiere_id">
        <option value="">Selecta Matière</option>
        
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
                $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/matieres`,
                    success:function (data){
                        console.log(data)
                        $('#matiere_id').html(`<option value="">Select 2 matiere</option>`);
                       data.forEach(function (value,index){
                            $('#matiere_id').append(`
                                <option value="${value.id}">${value.nom}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            });
            var annee_id = $('#annee_id').val();
            var classe_id = '{{$examen->classe_id}}'
            $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/classes`,
                    success:function (data){
                       $('#classe_id').html(`<option value="">Select 2 Classe</option>`);
                       data.forEach(function (value,index){
                            $('#classe_id').append(`
                                <option value="${value.id}" ${ classe_id == value.id ?'selected':''}>${value.numérotation}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
                var matiere_id = '{{$examen->matiere_id}}'
            $.ajax({
                   url:`{{route('annee.index')}}/${annee_id}/matieres`,
                    success:function (data){
                       $('#matiere_id').html(`<option value="">Select 2 matiere</option>`);
                       data.forEach(function (value,index){
                            $('#matiere_id').append(`
                                <option value="${value.id}" ${ matiere_id == value.id ?'selected':''}>${value.nom}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
        })

    </script>
    @endsection
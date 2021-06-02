@extends('layouts.master')
  @section('content')
  <div class="card">
    <div class="card-header">
        <h3> temps:    </h3>
    </div>
    <div class="card-body">
        <div class="form-row">

 
 
        <form method="post" action="{{ route('examen.store') }}">
         
              @csrf
              <div class="form-row">
            <div class="form-group col-md-12">
                <select class="form-control" id="annee_id">
                <option value="">Select Annee</option>
                @foreach($annees as $annee)
                <option value="{{ $annee->id}}"   {{ (@$editData->classe->annee_id)==$annee->id ? 'selected': ''}} >
                {{$annee->nom }}
                </option>
                @endforeach
                </select>
           </div>
           <div class="form-group col-md-12">
                <select class="form-control" id="classe_id" name="classe_id">
                    <option value="">Select Classe</option>
                </select>
            </div>

            <div class="form-group col-md-12">
                <select class="form-control" id="matiere_id" name="matiere_id">
                    <option value="">Select Matiere</option>
                   
                </select>
            </div>

        <div class="form-group col-md-12">
        <label for="date">Date</label>
              <input type="date" class="form-control" name="date"/>
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
                        console.log(data);
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
           
            $('#print').click(function(e){
                $('table').printThis({
                    header: `
                    <div>
                   <h3> Annee : ${$('#print').data('annee')}</h3>
                   <h3> Classe : ${$('#print').data('classe')}</h3>
                    </div>
                    `,
                });
            });
        })

    </script>

@endsection()
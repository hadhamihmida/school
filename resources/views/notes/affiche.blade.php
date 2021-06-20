@extends('layouts.master')
  @section('content')

<div class="card">
    <div class="card-header">
        <h3> Examen    </h3>
    </div>
    <div class="card-body">
        <div class="form-row">



            <div class="form-group col-md-4">
                <select class="form-control" id="annee_id">
                <option value="">Select Annee</option>
                @foreach($annees as $annee)
                <option value="{{ $annee->id}}"   {{ (@$editData->classe->annee_id)==$annee->id ? 'selected': ''}} >
                {{$annee->nom }}
                </option>
                @endforeach
                </select>
            </div>

            <div class="form-group col-md-4">
                <select class="form-control" id="classe_id" name="classe_id">
                    <option value="">Select Classe</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <select class="form-control" id="eleve_id" name="eleve_id">
                    <option value="">Select Eleve</option>
                </select>
            </div>
        </div>
       
        <div class="row">
            <div class="col-md-12" id="affiche">

            </div>
        </div>

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
            });
            $('body').on('change','#classe_id',function(e){
                var classe_id = e.target.value;
                $.ajax({
                   url:`{{route('classe.index')}}/${classe_id}/eleves`,
                    success:function (data){
                        console.log(data);
                        $('#eleve_id').html(`<option value="">Select 2 eleve</option>`);
                       data.forEach(function (value,index){
                            $('#eleve_id').append(`
                                <option value="${value.id}">${value.nom_el} ${value.prenom_el}</option>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            });
            $('body').on('change','#eleve_id',function(e){
                var eleve_id = e.target.value;
                $.ajax({
                   url:`{{url('eleves')}}/${eleve_id}/exmans`,
                    success:function (data){
                        console.log(data);
                        
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            });
            $('#print').click(function(e){
                $('table').printThis({
                    header: `
                   
                    `,
                });
            });
        })

    </script>

@endsection()


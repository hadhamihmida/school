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
        </div>

        <form action="{{route('note.store')}}" method="post">
            @csrf
            <div class="form-group col-md-4">
                <select class="form-control" id="examen_id" name="examen_id">
                    <option value="">Select examen</option>
                </select>
            </div>
            <div class="row" id="showEleves">
            </div>
            <button class="btn btn-primary" >Enregistrer</button>
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
            });
            $('body').on('change','#classe_id',function(e){
                var classe_id = e.target.value;
                $.ajax({
                   url:`{{route('classe.index')}}/${classe_id}/eleves`,
                    success:function (data){
                        console.log(data);
                        $('#showEleves').html('');
                        data.forEach(function (value,index){
                            $('#showEleves').append(`
                           <div class="col-6">
                            ${value.nom_el} ${value.prenom_el}
                            <input type="hidden" name="notes[${index}][eleve_id]" value="${value.id}">
                           </div>
                           <div class="col-3">
                            <div class="form-group">
                            <input type="text" class="form-control" name="notes[${index}][note]" placeholder="note">
                            </div>
                           </div>

                           <div class="col-3">
                            <div class="form-group">
                            <input type="text" class="form-control" name="notes[${index}][remarque]" placeholder="remarque">
                            </div>
                           </div>
                            `);

                       });

                    },
                    error:function (error){
                       console.log(error)
                    }
                });
                $.ajax({
                   url:`{{route('classe.index')}}/${classe_id}/examens`,
                    success:function (data){
                        console.log(data);
                       $('#examen_id').html(`<option value="">Select 2 examen</option>`);
                       data.forEach(function (value,index){
                            $('#examen_id').append(`
                                <option value="${value.id}">${value.matiere.nom}</option>
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

                    `,
                });
            });
        })

    </script>

@endsection()


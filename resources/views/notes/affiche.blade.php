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
                <table class="table">
                    <thead>
                    <tr>
                        <th>Matiere</th>
                        <th>Note</th>
                        <th>Cofficient</th>
                        <th>Remarque</th>
                        <th>multiple</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>

            <div class="col-md-12" id="data2">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Matiere</th>
                        <th>Note</th>
                        <th>Cofficient</th>
                        <th>Remarque</th>
                        <th>multiple</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
                       console.log(data)
                       $('#affiche tbody').html('');
                       let sumMulti=0;
                       data.data['semseter_1'].forEach(function (value,index){
                           sumMulti+=value.multi;
                           $('#affiche tbody').append( `
                            <tr>
                                <td>${value.matiere.nom}</td>
                                <td>${value.pivot.note}</td>
                                <td>${value.matiere.nombre}</td>
                                <td>${value.pivot.remarque}</td>
                                <td>${value.multi}</td>
                            </tr>
                           `)
                       })
                        $('#affiche tbody').append(`
                            <tr>
                                <td colspan="4">somme</td>
                                <td>${sumMulti}</td>
                            </tr>
                           `);
                        $('#affiche tbody').append(`
                            <tr>
                                <td colspan="4">moyenne</td>
                                <td>${sumMulti/data.sum}</td>
                            </tr>
                           `);


                        $('#data2 tbody').html('');
                        let sumMulti2=0;
                        console.log(Object.values(data.data['semseter_2']))
                        Object.values(data.data['semseter_2']).forEach(function (value,index){
                            sumMulti2+=value.multi;
                            $('#data2 tbody').append( `
                            <tr>
                                <td>${value.matiere.nom}</td>
                                <td>${value.pivot.note}</td>
                                <td>${value.matiere.nombre}</td>
                                <td>${value.pivot.remarque}</td>
                                <td>${value.multi}</td>
                            </tr>
                           `)
                        })
                        $('#data2 tbody').append(`
                            <tr>
                                <td colspan="4">somme</td>
                                <td>${sumMulti2}</td>
                            </tr>
                           `);
                        $('#data2 tbody').append(`
                            <tr>
                                <td colspan="4">moyenne</td>
                                <td>${sumMulti2/data.sum2}</td>
                            </tr>
                           `);


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


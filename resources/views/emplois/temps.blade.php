@extends('layouts.master')
  @section('content')

<div class="card">
<div class="card-header">
        <h3> temps:    </h3>
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

    <table class="table">
        <thead>
            <tr>
                <th>Jour</th>
                <th>Date_debut</th>
                <th>Date_fin</th>
                <th>Professeur</th>
                <th>Matiere</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <button id="print" class="btn btn-primary">Imprimer</button>







           </div>


    <!-- /.content -->

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
                   url:`{{route('temps.index')}}/${classe_id}`,
                    success:function (data){
                        let myArray=data.sort((a,b) => (a.heure_debut > b.heure_debut) ? 1 : ((b.heure_debut > a.heure_debut) ? -1 : 0));
                        let semaine={
                            1:'Lundi',
                            2:'Mardi',
                            3:'Merecredi',
                            4:'Jeudi',
                            5:'Vendredi',
                            6:'Samedi',
                        };
                        let seancesPerJour={
                            1:{'jour':'Lundi','seances':[]},
                            2:{'jour':'Mardi','seances':[]},
                            3:{'jour':'Merecredi','seances':[]},
                            4:{'jour':'Jeudi','seances':[]},
                            5:{'jour':'Vendredi','seances':[]},
                            6:{'jour':'Samedi','seances':[]},
                        };
                        myArray.forEach(function (value,index){
                            seancesPerJour[value.jour]['seances'].push(value);
                       });
                       var result = Object.keys(seancesPerJour).map((key) => [Number(key), seancesPerJour[key]]);
                        $('tbody').html('');
                        result.forEach(function (value,index){
                            console.log(value)
                            let seances_to_show=``;     
                            var result2 = Object.keys(value[1]['seances']).map((key) => [Number(key), value[1]['seances'][key]]);
                            let table='';
                            if(value[1]['seances'].length > 0){
                                result2.forEach(function (value,index){
                                    seances_to_show+=`<tr>
                                    <td>${value[1].heure_debut}</td>
                                    <td>${value[1].heure_fin}</td>
                                    <td>${value[1].prof.nom}</td>
                                    <td>${value[1].prof.matiere.nom}</td>
                                    <td><a href="{{url('/absent_prof')}}/${value[1].id}">Ajoute absent</a></td></tr>
                                    `;
                                });
                                table=`<td>${seances_to_show}</td>`;
                            }else{
                                table=`<td colspan="5">jour libre</td>`;
                            }
                            
                            $('tbody').append(`
                                <tr>
                                    <td rowspan="${value[1]['seances'].length == 0 ? 1 : value[1]['seances'].length+1}">${value[1]['jour']}</td>
                                    ${table}
                                </tr>
                            `);
                       });
                    },
                    error:function (error){
                       console.log(error);
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
    @endsection
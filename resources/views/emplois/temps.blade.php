@extends('layouts.master')
  @section('content')

<div class="card">
<div class="card-header">
        <h3> temps:    </h3>
        </div>
           <div class="card-body">
  <div class="form-row">



    <div class="form-group col-md-4">
        <select class="form-control" id="annee_id" ">
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
                       console.log(data)
                    },
                    error:function (error){
                       console.log(error)
                    }
                });
            });
        })

    </script>
    @endsection
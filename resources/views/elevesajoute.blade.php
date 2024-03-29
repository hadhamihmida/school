  @extends('layouts.master')
  @section('content')

        <div class="card">
        <div class="card-header">
        <h3> Identifier élèves    </h3>
        </div>
           <div class="card-body">

 <form method="post" action="{{ (@$editData)?route('update.Student', @$editData->id): route('store.Student')  }}"  enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <input name="nom_el" type="text"    class="form-control"  value="{{ (@$editData->nom_el) }}"  >
      @error('nom_el')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
    </div>

      <div class="form-group col-md-4">
          <input name="prenom_el"   type="text"  
               class="form-control" value="{{ (@$editData->prenom_el) }}"  >
          @error('prenom_el')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
      </div>

      <div class="form-group col-md-4" >
          <input   name="date_naiss" type="date"     class="form-control" value="{{ (@$editData->date_naiss) }}"    >
          @error('date_naiss')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
      </div>

    <div class="form-group col-md-4">
        <select class="form-control" name="parent_id" value="{{old('parent_id')}}">
         @foreach($parents as $parent)
         <option value="{{ $parent->id  }}"  {{ (@$editData->parent_id)==$parent->id ? 'selected': ''}} >
          {{$parent->nom_pr.' '. $parent->prenom_pr }}
         </option>
         @endforeach
         @error('parent_id')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
        </select>


    </div>

    <div class="form-group col-md-4">
        <select class="form-control" id="annee_id" name="annee_id" value="{{old('annee_id')}}">
        <option value="">Selecte Année</option>
         @foreach($annees as $annee)
         <option value="{{ $annee->id}}"   {{ (@$editData->classe->annee_id)==$annee->id ? 'selected': ''}} >
          {{$annee->nom }}
         </option>
         @endforeach
        </select>
        @error('annee_id')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
    </div>

      <div class="form-group col-md-4">
          <select class="form-control" id="classe_id"  name="classe_id" vlue="{{old('classe_id')}}">
              <option value="">Selecte Classe</option>
          </select>
          @error('classe_id')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
      </div>

       <div class=" form-group col-md-6">
         <input name="image"    type="file" class="form-control" value="{{old('image')}}"  value="{{ (@$editData->image) }}"    id="image" placeholder=" select_image">
         @error('image')
              <small class="form-text text-danger">{{$message}}</small>
              @enderror
      </div>

      <div class=" form-group col-md-6">
         <img src=""  id="showImage" style="width: 150px; height:160px; border:1px solid #000;">
      </div>
    </div>

  <button type="submit" class="btn btn-primary">{{ (@$editData)? 'update':'Enregistrer' }}</button>
  </form>


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

  @extends('layouts.master')
  @section('content')
     
        <div class="card">
        <div class="card-header">
        <h3> Identifier élèves:    </h3>
        </div>
           <div class="card-body">

 <form methode="post" action="{{ route('store.Student') }}" enctype="multipart/form-data">
  @csrf
  <div class="form-row">
    <div class="form-group col-md-4">
      <input name="nom_el" type="text" class="form-control"  placeholder=" nom_élève">
    </div>

    <div class="form-group col-md-4">
        <select class="form-control" name="parent_id">
         @foreach($parents as $parent)
         <option value="{{ $parent->id  }}">
          {{$parent->nom_pr.' '. $parent->prenom_pr }}
         </option>
         @endforeach
        </select>

    </div>



    <div class="form-group col-md-4">
      <input name="prenom_el"   type="text" class="form-control"  placeholder=" prenom_élève">
    </div>

    <div class="form-group col-md-4" > 
                    <input   name="date_naiss" type="date" class="form-control"  placeholder="Date_Naissance">
              </div>

    <div class=" form-group col-md-4">
      <input   name="adresse_el"        type="text" class="form-control"   placeholder=" adresse_élève">
    </div>

       <div class=" form-group col-md-4">
         <input name="classe"      type="text" class="form-control"  placeholder=" classe_élève">
      </div>

       <div class="col-md-4">
          <input name="nom_pr"     type="text" class="form-control"  placeholder=" nom_parent">
       </div>

      <div class="form-group col-md-4">
         <input  name="email_pr"   type="text" class="form-control"  placeholder=" email-parent">
      </div>

       <div class=" form-group col-md-6">
         <input name="image"    type="file" class="form-control"  id="image" placeholder=" select_image">
      </div>
      
      <div class=" form-group col-md-6">
         <img src=""  id="showImage" style="width: 150px; height:160px; border:1px solid #000;">
      </div>
    </div>
  
  <button type="submit" class="btn btn-primary">Enregistrer</button>
  </form>


           </div>

    <!-- /.content -->

    @endsection
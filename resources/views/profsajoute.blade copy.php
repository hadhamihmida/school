<x-app-layout>
    <x-slot name="slot">
   
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          <ul class="navbar-nav">
             <li class="nav-item">
               <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
          </ul>
          <h1 class="m-0 text-dark">
          @if(isset($editData))
             Modifier Information
          @else
            Insert Information
          @endif
          </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">professeures</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

 <div class="card-body">
       
   <section class="col-md-11">
  <div class="card">
   <div class="card-header">
     <h3> Insert vos Information </h3>
   </div>
 </div>

 <div class="card-body">
  <form methode="post" action="{{ (@$editData)?route('update.profs', $editData->id): route('store.profs') }}" enctype="multipart/from-data">
    @csrf
    <div class="form-row">
    <div class="form-group col-md-6">
            <label for="inputNom">Nom</label>
            <input type="text"  name="nom"  value="{{ (@$editData->nom) }}" class="form-control"  placeholder="Nom">
       </div>
         <div class="form-group col-md-6">
            <label for="inputPrenom">Prenom</label>
            <input type="text"  name="prenom"  value="{{ (@$editData->prenom) }}"     class="form-control"  placeholder="Prenom">
       </div>
  </div>
          <div class="form-group">
              <label for="inputSpecialite">Specialite</label>
             <input type="text" name="specialite"  value="{{ (@$editData->specialite) }}"         class="form-control"  placeholder="Specialite">
         </div>
         <div class="form-row">
               <div class="form-group col-md-6">
                    <label for="inputCin">Cin</label>
                    <input type="int"   name="cin"   value="{{ (@$editData->cin) }}"          class="form-control"  placeholder="Cin">
               </div>
                <div class="form-group col-md-6">
                    <label for="inputDate_Naissance">Date_Naissance</label>
                    <input type="date"  name="date_naissance"   value="{{ (@$editData->date_naissance) }}"      class="form-control"  placeholder="Date_Naissance">
              </div>
            </div>
               <div class="form-group col-md-6">
                   <label for="inputEmail">Email</label>
                   <input type="email" name="email"   value="{{ (@$editData->email) }}"     class="form-control"  placeholder="Email">
              </div>
                <div class="form-group col-md-6">
                      <label for="inputAdresse">Adresse</label>
                      <input type="text"  name="adresse"  value="{{ (@$editData->adresse) }}"       class="form-control"  placeholder="Adresse">
               </div>
                     <div class="form-group col-md-6">
                         <label for="inputTel">Tel</label>
                        <input type="int" name="tel"  value="{{ (@$editData->tel) }}"       class="form-control" placeholder="Tel">
                   </div>
                       <div class="form-group col-md-4">
                             <label for="inputExperience">Experience</label>
                             <input type="int"  name="experience"  value="{{ (@$editData->experience) }}"    class="form-control"  placeholder="Experiences" >
                      </div>
                   </div>
                                           <button type="submit" class="btn btn-primary">{{ (@$editData)? 'update':'Enregistrer' }}</button>
  </form>
 </div>


</section>

</div>

</x-slot>
</x-app-layout>
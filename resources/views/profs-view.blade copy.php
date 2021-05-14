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
            
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>

              <li class="breadcrumb-item active">Dashboard v2</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


       
   <section class="col-md-11">
       <div class="card">
                <div class="card-header">
                 <h3>
                 liste des profs
                 <a class="btn btn-success float-right btn-sm" href="{{ route('ajoute.profs') }}"><i class="fa fa-list"></i>Ajout</a>
                 </h3>
                </div>

                   <div class="card-body">
                        <table id="myTable" class=" table table-striped table-bordered" style="width: 70%">
                            <thead>
                                <tr>
                                   <th style="font: size 13px">id</th>
                                   <th style="font: size 13px">nom</th>
                                   <th style="font: size 13px">prenom</th>
                                   <th style="font: size 13px">email</th>
                                   <th style="font: size 13px">specialite</th>
                                   <th style="font: size 13px">cin</th>
                                   <th style="font: size 13px">date_naissance</th>
                                   <th style="font: size 13px">adresse</th>
                                   <th style="font: size 13px">tel</th>
                                   <th style="font: size 13px">action</th>
                              </tr>
                         @foreach($allData as $key => $data)
                            <tr class="">
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $data->nom }}</td>
                                     <td>{{ $data->prenom }}</td>
                                     <td>{{ $data->email }}</td>
                                     <td>{{ $data->specialite }}</td>
                                     <td>{{ $data->cin }}</td>
                                     <td>{{ $data->date_naissance }}</td>
                                     <td>{{ $data->adresse }}</td>
                                     <td>{{ $data->tel }}</td>
                                  
                              <td>            
                                   <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('edit.profs' ,$data->id ) }}">Modifier</a>
                                  <a title="Delete"  id="delete" class="btn btn-sm btn-danger" href="{{ route('delete.profs', $data->id) }}">Supprimer</a>
                              </td>
                         </tr>

                         @endforeach
                           </thead>
                       </table>
                    </div>

   
         </div>


</section>



</x-slot>
</x-app-layout>
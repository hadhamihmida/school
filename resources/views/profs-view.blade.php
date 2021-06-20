@extends('layouts.master')
  @section('content')
       <div class="card">
                <div class="card-header">
                 <h3>
                 liste des profs
                 <a class="btn btn-secondary float-right btn-sm" href="{{ route('ajoute.profs') }}"><i class="fa fa-list"></i>Ajout</a>
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
                                   <th style="font: size 13px">cin</th>
                                   <th style="font: size 13px">Spécialité</th>
                                   <th style="font: size 13px">date_naissance</th>
                                   <th style="font: size 13px">adresse</th>
                                   <th style="font: size 13px">Experience</th>
                                   <th style="font: size 13px">tel</th>
                                   <th style="font: size 13px">action</th>
                              </tr>
                         @foreach($allData as $key => $data)
                            <tr class="">
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $data->nom }}</td>
                                     <td>{{ $data->prenom }}</td>
                                     <td>{{ $data->email }}</th>
                                     <td>{{ $data->cin }}</td>
                                     <td> {{  $data->matiere->nom}}</td>
                                     <td>{{ $data->date_naissance }}</td>
                                     <td>{{ $data->adresse }}</td>
                                     <td>{{ $data->experience}}</td>
                                     <td>{{ $data->tel }}</td>
                                  
                              <td>            
                            

               <form action="{{ route('destroy.profs', $data->id)}}" method="get" style="display: inline-block">
              
              <a href="{{ route('edit.profs' ,$data->id)}}" class="btn btn-primary btn-sm">Modifier</a>

                  @csrf
                  @method('DELETE')
                  <button class="btn btn-warning btn-sm delete" type="submit">Supprimer</button>
                </form>
                              </td>
                         </tr>

                         @endforeach
                           </thead>
                       </table>
                       {{ $allData->links('pagination.input') }}
                    </div>

@endsection
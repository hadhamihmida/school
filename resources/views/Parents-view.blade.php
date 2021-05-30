@extends('layouts.master')
  @section('content')
       <div class="card">
                <div class="card-header">
                 <h3>
                 liste des Parents
                 <a class="btn btn-success float-right btn-sm" href="{{ route('ajoute.Parent') }}"><i class="fa fa-list"></i>Ajout</a>
                 </h3>
                </div>

                   <div class="card-body">
                        <table id="myTable" class=" table table-striped table-bordered" >
                            <thead>
                                <tr>
                                   <th style="font: size 13px">id</th>
                                   <th style="font: size 13px">nom</th>
                                   <th style="font: size 13px">prenom</th>
                                   <th style="font: size 13px">email</th>
                                   <th style="font: size 13px">cin</th>
                                   <th style="font: size 13px">tel</th>
                                   <th style="font: size 13px">nombre</th>
                                   <th style="font: size 13px">action</th>
                              </tr>
                         @foreach($allData as $key => $data)
                            <tr class="">
                                     <td>{{ $key+1 }}</td>
                                     <td>{{ $data->nom_pr }}</td>
                                     <td>{{ $data->prenom_pr }}</td>
                                     <td>{{ $data->email }}</td>
                                     <td>{{ $data->cin }}</td>
                                     <td>{{ $data->tel }}</td>
                                     <td>{{ $data->nombre }}</td>

                              <td>


                                  <form action="{{ route('destroy.Parent', $data->id)}}" method="get" style="display: inline-block">
              
                                      <a href="{{ route('edit.Parent' , $data->id)}}" class="btn btn-primary btn-sm">Modifier</a>

                                       @csrf
                                     @method('DELETE')
                                        <button class="btn btn-danger btn-sm delete" type="submit">Supprimer</button>
                                         </form>
                               </td>
                         </tr>

                                    @endforeach
                           </thead>
                       </table>
                    </div>

@endsection

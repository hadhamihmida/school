@extends('layouts.master')
  @section('content')
    <div class="card">
        <div class="card-header">
        <a class="btn btn-success float-right btn-sm" href="{{ route('ajoute.Student') }}"><i class="fa fa-list"></i>Ajout</a>
        <h3> Liste d'information:    </h3>
        </div>
           <div class="card-body">
           <table id="myTable" class=" table table-striped table-bordered" >
                            <thead>
                                <tr>
                                   <th style="font: size 13px">id</th>
                                   <th style="font: size 13px">nom_E</th>
                                   <th style="font: size 13px">prenom_E</th>
                                   <th style="font: size 13px">date_naiss</th>
                                   <th style="font: size 13px">classe</th>
                                   <th style="font: size 13px">Parent</th>
                                   <th style="font: size 13px">Image</th>
                                   <th style="font: size 13px">action</th>
                              </tr>
                              @foreach($allData as $key => $data)
                            <tr class="">
                                    <td>{{ $key+1 }}</td>
                                     <td>{{ $data->nom_el }}</td>
                                     <td>{{ $data->prenom_el}}</td>
                                     <td>{{ $data->date_naiss }}</td>
                                     <td>{{ $data->classe->numérotation }}</td>
                                     <td>{{ $data->parent->nom_pr.''.$data->parent->prenom_pr }}</td>
                                     <td><a href="{{(!empty($data->image))?url('/').'/upload/'.$data->image:url('upload/no_images.png')}}">
                                 <img  src="{{(!empty($data->image))?url('/').'/upload/'.$data->image:url('upload/no_images.png')}}" style="width: 100px; height:100px; border:1px solid #000;"></a></td>

                                 <td>
                                   <a title="Edit" class="btn btn-sm btn-primary" href="{{ route('edit.Student' ,$data->id ) }}">Modifier</a>
                                  <a title="Delete"  id="delete" class="btn btn-sm btn-danger" href="{{ route('delete.Student', $data->id) }}">Supprimer</a>
                              </td>

                         </tr>

                         @endforeach
                           </thead>
                       </table>


          </div>



    </div>

@endsection

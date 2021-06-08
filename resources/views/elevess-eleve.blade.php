@extends('layouts.master')
  @section('content')
    <div class="card">
        <div class="card-header">
        <a class="btn btn-secondary float-right btn-sm" href="{{ route('ajoute.Student') }}"><i class="fa fa-list"></i>Ajout</a>
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
                                   <th style="font: size 13px">Annee</th>
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
                                     <td>{{ $data->classe->annee->nom }}</td>
                                     <td>{{ $data->parent->nom_pr.''.$data->parent->prenom_pr }}</td>
                                    
                                     <td><a href="{{(!empty($data->image))?url('/').'/upload/'.$data->image:url('upload/no_images.png')}}">
                                 <img  src="{{(!empty($data->image))?url('/').'/upload/'.$data->image:url('upload/no_images.png')}}" style="width: 100px; height:100px; border:1px solid #000;"></a></td>

                                 <td>
                                   
                                  <form action="{{ route('destroy.Student', $data->id)}}" method="get" style="display: inline-block">
              
                                   <a href="{{ route('edit.Student' ,$data->id)}}" class="btn btn-primary btn-sm">Modifier</a>

                                      @csrf
                                          @method('DELETE')
                                      <button class="btn btn-warning btn-sm delete" type="submit">Supprimer</button>
                              </form>
                                  
                              </td>

                         </tr>

                         @endforeach
                           </thead>
                       </table>
                    {{$allData->links('pagination.input')}}

          </div>



    </div>

@endsection

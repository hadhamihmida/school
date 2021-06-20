@extends('layouts.master')

@section('content')
<div class="container-fluid">
     <!-- Small boxes (Stat box) -->
     <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$profs_count}}</h3>

                <p>Profes count</p>
              </div>
              <div class="icon">
                <i class="ion ion-briefcase"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$eleves_count}}</h3>

                <p>eleves count</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$Classe_count}}</h3>

                <p>Classe</p>
              </div>
              <div class="icon">
                <i class="ion ion-home"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger disabled ">
              <div class="inner">
                <h3>{{$Annee_count}}</h3>

                <p>Annee</p>
              </div>
              <div class="icon">
                <i class="ion ion-clipboard"></i>
              </div>
             
            </div>
          </div>
          <!-- ./col -->
            @foreach($annes_nom as $key=>$value)
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-{{$bg_colors[$key]}}">
              <div class="inner">
                <h3>{{$eleves_count_per_annee[$key]}}</h3>

                <p>eleves de {{$value}}</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-stalker"></i>
              </div>
              
            </div>
            
          </div>
          @endforeach
        </div>

</div>
@endsection

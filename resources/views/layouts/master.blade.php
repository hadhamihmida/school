<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecole&&Privée</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- datables css --}}
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">

  {{-- toaster --}}
  <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
  <script src="{{ asset('js/app.js') }}" defer></script>

{{-- sweetalert --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                @endif
                @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="index3.html" class="brand-link">
                <img src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Admin</span>
            </a>

            <!-- this is Sidebar --> 
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset('img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">ssbrar</a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item menu-open">
                            <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Links
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <!-- here you can create more links like i did -->
                                    <a href="{{route('view.profs')}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Professeures</p>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <a href="{{route('eleve.Student')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Eleves</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{route('view.Parent')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Parents</p>
                                    </a>
                                </li>
                               
                            </ul>
                        </li>
                        <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    scolarité
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                <!-- here you can create more links like i did -->
                                    <a href="{{route('matiere.index')}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Matiere</p>
                                    </a>
                                    <a href="{{route('classe.index')}}" class="nav-link active">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Classe</p>
                                    </a>
                                </li>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Starter Page</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Starter Page</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                <!-- every blad.php file is inserted here  -->
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
              great job
            </div>
            <!-- Default to the left -->
            
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <!-- Bootstrap 4 -->
    <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
    <!-- AdminLTE App -->
    <!-- <script src="dist/js/adminlte.min.js"></script> -->
  
  <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
    <script type="text/javascript">
$(document).ready( function () {
  $('#myTable').DataTable();
  $('#image').change(function(e){
    var reader = new FileReader();
    reader.onload=function(e){
      $('#showImage').attr('src',e.target.result);
    }
    reader.readAsDataURL(e.target.files['0']);
  });
});
</script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script>
     @if( Session::has('message') )
         var type ="{{ Session::get('alert-type', 'info') }}";
        switch(type){
             case 'info':
              toastr.info("{{ Session::get('message') }}");
         break;
            case 'warning':
                toastr.warning("{{ Session::get('message') }}");
               break;
                case 'success':
                     toastr.success("{{ Session::get('message') }}");
                 break;
                      case 'error':
                         toastr.error("{{ Session::get('message') }}");
                       break;
        }
      @endif

</script>
{{-- sweet Alert --}}

<script type="text/javascript">
  $(function(){
    $(document).on ('click','#delete', function(e){
      e.preventDefault();
      var link=$(this).attr("href");
      swal.fire({
       title: 'êtes-vous sûr?',
       text: "Vous ne pourrez pas annuler cela!",
       icon: 'Attention',
       showCancelButton: true,
       confirmButtonColor: '#3085d6',
       cancelButtonColor: '#d33',
       confirmButtonText: 'Oui, supprimez-le!'
      }).then((result)=>{
        if(result.value){
          window.location.href = link;
          swal.fire(
            'Supprimé!',
            'Votre fichier a été supprimé!.',
            'Succès'

          )
        }
      })
      
    });
  });

 
</body>

</html>
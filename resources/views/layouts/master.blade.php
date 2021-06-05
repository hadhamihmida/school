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
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        {{-- datables css --}}
         <link rel="stylesheet" href="http://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">


      {{-- toaster --}}
      <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
        @yield('styles')
    </head>

    <body class="hold-transition sidebar-mini">

        <div class="wrapper">

            @include('layouts.partials.header')


            @include('layouts.partials.aside')


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
        <!--<script src="plugins/jquery/jquery.min.js"></script>-->
        <!-- Bootstrap 4 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <!-- <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script> -->
        <!-- AdminLTE App -->
        <script src="{{ asset('js/printThis.js') }}"></script>
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
        {{--sweetalert2--}}
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     
        {{-- sweet Alert --}}

        <script type="text/javascript">
  $(function(){
    $('body').on ('click','.delete', function(e){
      e.preventDefault();
      const that = $(this);
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
          swal.fire(
            'Supprimé!',
            'Votre fichier a été supprimé!.',
            'Succès'
          )
          that.closest('form').submit(); 
        }
      })
    });
  });
</script>
        @yield('scripts')
    </body>

</html>

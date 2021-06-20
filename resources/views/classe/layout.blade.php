<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Classes</title>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
   </head>
   <body>
      <div class="container">
         @yield('content')
      </div>
      {{--sweetalert2--}}
     <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
      <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" type="text/js"></script>

     
     
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

   </body>
</html>
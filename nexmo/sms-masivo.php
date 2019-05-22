<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.5/dist/sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@8.8.5/dist/sweetalert2.min.css">


    <title>SMS Masivo</title>
  </head>
  <body>
  
  <div class="container-fluid">
  <div class="row">
  <div class="col-md-12">
     
   <h1>Envío Masivo</h1> <hr>

  <form id="sms" autocomplete="off">
     
  <ul class="clientes">
  </ul> 

   <div class="form-group">
    <label>Mensaje</label>
    <textarea name="mensaje" rows="3" class="form-control" maxlength="140" required></textarea>
   </div>


  <button  type="submit" class="btn btn-primary">Enviar</button>

  </form>

  </div>
  </div>
  </div>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


<script>
$(document).ready(function (){

clientes = '';
$.getJSON('sources.php?opcion=2',{},function(data){

data.forEach(function (row){


clientes += '<input type="checkbox" name="numero[]"  value="'+row.prefijo+row.numero+'"  /> '+row.nombres+'<br>';

$('.clientes').html(clientes);


});


});

});

//Envío de SMS

 $(document).on('submit','#sms',function(e){

  parametros = $(this).serialize();

  $.ajax({

   url:'sources.php?opcion=3',
   type:'POST',
   dataType:'JSON',
   data:parametros,

   beforeSend:function()
   {

   
Swal.fire({
title: 'Cargando',
text:  'No cierre la ventana',
imageUrl: 'img/loader.gif',
showConfirmButton:false
});




   },
   success:function(data){
 
Swal.fire({

title: data.title,
text:  data.text,
type:  data.type,
timer: 4000,
showConfirmButton:false

});

   



   }





  });



 e.preventDefault();
 });




</script>

  </body>
</html>
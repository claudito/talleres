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


    <title>SMS</title>
  </head>
  <body>



  <div class="container-fluid">
  
  <div class="row">
    
  <div class="col-md-12">
    
  <button class="btn btn-primary btn-sms" >Enviar SMS</button>

  </div>


  </div>


  </div>

   
   <!-- Modal SMS -->

<form id="sms" autocomplete="off">

<!-- Modal -->
<div class="modal fade" id="modal-sms" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
  <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<div class="modal-body">
 
<div class="form-group row">
<label  class="col-sm-3 col-form-label">Prefijo País</label>
<div class="col-sm-3">
  <input type="text" name="prefijo"  class="form-control">
</div>
<label class="col-sm-2 col-form-label">Número</label>
<div class="col-sm-4">
  <input type="text" name="numero"  class="form-control">
</div>
</div>


<div class="form-group row">
<label  class="col-sm-3 col-form-label">Mensaje</label>
<div class="col-sm-9">
  
<textarea name="mensaje" class="form-control"  rows="3" maxlength="140"></textarea>

</div>
</div>



</div>
<div class="modal-footer">
  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
  <button type="submit" class="btn btn-primary">Enviar SMS</button>
</div>
</div>
</div>
</div>




</form>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.0.min.js" ></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


 <script>
   
  //Cargar Modal SMS
 $(document).on('click','.btn-sms',function(){

  
  $('.modal-title').html('Enviar SMS');
  $('#modal-sms').modal('show');

 });


 //Envío de SMS

 $(document).on('submit','#sms',function(e){

  parametros = $(this).serialize();

  $.ajax({

   url:'sources.php?opcion=1',
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
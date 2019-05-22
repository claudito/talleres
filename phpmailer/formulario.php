<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


    <!-- SummerNote -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote-bs4.js"></script>


    <!-- Sweet Alert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">




    <title>Formulario de Contacto</title>
  </head>
  <body>

   <div class="container-fluid">
     
   <div class="row">
     
   <div class="col-md-12">

    <h1>Enviar Correo</h1> <hr>

   <form id="enviar" autocomplete="off">

     <div class="form-group row">

    <label  class="col-sm-2 col-form-label">Nombre</label>
    <div class="col-sm-6">
      <input type="text" name="nombre" class="form-control" placeholder="Ingresar su Nombre" required>
    </div>

    </div>


     
    <div class="form-group row">

    <label  class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-6">
      <input type="email" name="correo" class="form-control" placeholder="Ingresar el Correo" required>
    </div>

    </div>


    <div class="form-group row">
      
    <label class="col-sm-2 col-form-label">Asunto</label>
    
    <div class="col-sm-5">
    <input type="text" name="asunto" class="form-control" required>
    </div>


    </div>


    <div class="form-group row">
      
    <label class="col-sm-2 col-form-label">Mensaje</label>
    
    <div class="col-sm-10">
    <textarea name="mensaje" class="mensaje form-control" rows="10" required></textarea>
    </div>

    <script>
    $('.mensaje').summernote({
        placeholder: 'Ingrese el contenido de su mensaje',
        tabsize: 2,
        height: 250
      });
    </script>




    </div>


    <div class="form-group row">
    <label class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    </div>





   </form>

     


   </div>


   </div>
 
   </div>



  <script>
    
  $(document).on('submit','#enviar',function(e){

   parametros = $(this).serialize();
   
   
   $.ajax({
   
   url:"send.php",
   type:"POST",
   data:parametros,
   dataType:"JSON",
   beforeSend:function()
   {
   
    swal({

    title: "Enviando Mensaje",
    text: "Espere un momento no Cierre la Ventana",
    imageUrl: 'img/loader2.gif',
    showConfirmButton: false

    });
  

   },
   success:function(data)
   {

     swal({

    title: data.title,
    text:  data.text,
    type:  data.type,
    timer: 3000,
    showConfirmButton: false

    });


    $('#enviar')[0].reset();
    $(".mensaje").summernote("code", "");



   }





   });
   

 

  e.preventDefault();
  });


  </script>
  </body>
</html>



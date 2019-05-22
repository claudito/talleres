<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>DataTables y PHP</title>



<!-- CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">


<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">


</head>
<body>


<div class="container-fluid">

<div class="row">


<div class="col-md-12">

<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>Id</th>
<th>Empresa</th>
<th>Dni</th>
<th>Apellidos y Nombres</th>
<th>Cargo</th>
<th>Fecha Ingreso</th>
<th>Acciones</th>
</tr>
</thead>


</table>






</div>

</div>

</div>

<!-- Modal Editar -->
<div class="modal fade" id="modal-editar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <input type="file" name="" id="">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Editar</button>
      </div>
    </div>
  </div>
</div>


<!-- JS -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>

<script>

$(document).ready(function() {
$('#example').DataTable({


"processing": true,
"serverSide": true,
"ajax":"source.php",

"columns":[

{"data":"id"},
{"data":"empresa"},
{"data":"dni"},
{"data":"apellidos_nombres"},
{"data":"cargo"},
{"data":"fecha_ingreso"},
{

"data":null,render:function(data){

acciones  = '<button  data-nombres="'+data.apellidos_nombres+'" data-id="'+data.id+'"   class="btn btn-primary btn-edit">Editar</button>'


return acciones;



}


}


],

"language":{

"url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"

}



});
} );


//Cargar Modal Editar
$(document).on('click','.btn-edit',function(){

id       = $(this).data('id');
nombres  = $(this).data('nombres');

$('.modal-title').html(nombres);
$('#modal-editar').modal('show');


});


</script>

</body>
</html>
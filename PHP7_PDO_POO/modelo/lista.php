<?php 

include'Conexion.php';
include'Usuario.php';

$usuario =  new Usuario();
$lista   =  $usuario->lista();

//var_dump($lista);
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

<!-- Datatables -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">
<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>



</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de Usuarios</h3>
	</div>
	<div class="panel-body">
	
    <div class="table-responsive">
     <table  id="consulta"  class="table">
 
 <thead>
 <tr>
 <th>id</th>
 <th>nombres</th>
 <th>apellidos</th>
 <th>dni</th>
 <th>dirección</th>
 <th>fecha de nacimiento</th>
 <th>fecha de creación</th>
 </tr>
 </thead>
 <tbody>

 <?php foreach ($lista as $key => $value): ?>
 <tr>
<td><?php echo $value['id'] ?></td>
<td><?php echo $value['nombres'] ?></td>
<td><?php echo $value['apellidos'] ?></td>
<td><?php echo $value['dni'] ?></td>
<td><?php echo $value['direccion'] ?></td>
<td><?php echo $value['fecha_nacimiento'] ?></td>
<td><?php echo $value['fecha_creacion'] ?></td>
 </tr>
 <?php endforeach ?>
 
 </tbody>

 </table>
    </div>

	</div>
</div>


</div>
</div>
</div>
<script>
$(document).ready( function () {
    $('#consulta').DataTable({
    
    "language":{

    	"url":"https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
    }
 

    });
} );
</script>
</body>
</html>
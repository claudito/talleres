<?php 

//Query SQL
$query =  "SELECT  

id,
mes,
CAST(valor AS DECIMAL(8,2))valor


FROM ventas";

//Sentencia Preparada
$statement = $conexion->prepare($query);

//Ejecutar el Código
$statement->execute();

//Array de Datos
$result =  $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);



 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Reporte de Ventas</title>
</head>
<body>
	
<h1>Reporte de Ventas</h1> <hr>

<table>
	
<thead>

<tr>
<th>Id</th>
<th>Mes</th>
<th>Valor</th>
</tr>
	
</thead>

<tbody>

<?php foreach ($result as $key => $value): ?>
<tr>

<td><?= $value['id']  ?></td>
<td><?= $value['mes'] ?></td>
<td><?= $value['valor'] ?></td>


</tr>
<?php endforeach ?>

</tbody>



</table>



</body>
</html>
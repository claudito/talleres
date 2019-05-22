<?php 

//Query SQL
$query =  " 

SELECT 

t1.id,
t1.vendedor,
t1.mes,
CAST(t1.valor AS DECIMAL(8,2))valor ,
CAST(t2.valor AS DECIMAL(8,2)) total,

CAST(  (t1.valor*100)/(t2.valor) AS DECIMAL(8,2) ) porcentaje



FROM db_ventas.vendedores t1

INNER JOIN 
(

SELECT  
id,
mes,
valor
FROM dompdf_db.ventas


) t2 ON t1.mes=t2.mes




 ";

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
<link rel="stylesheet" href="style.css">
</head>
<body>
	
<h1 style="padding-left: 40px">Reporte de Ventas</h1> <hr>

<table class="table_report">
	
<thead>

<tr style="background-color: skyblue">
<th class="column">Vendedor</th>
<th class="column right">Mes</th>
<th class="column center">Venta</th>
<th class="column center">Total del Mes</th>
<th class="column center">Porcentaje</th>
</tr>
	
</thead>

<tbody>

<?php foreach ($result as $key => $value): ?>
<tr>

<td class="column"><?= $value['vendedor']  ?></td>
<td class="column right"><?= $value['mes'] ?></td>
<td class="column center"><?= $value['valor'] ?></td>
<td class="column center"><?= $value['total'] ?></td>
<td class="column center"><?= $value['porcentaje'] ?></td>

</tr>
<?php endforeach ?>

</tbody>



</table>



</body>
</html>
<?php 

try {

$conexion = new PDO(

'mysql:host=localhost;dbname=test',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);
//Activar Mensajes de Error
$conexion->setAttribute(
	PDO::ATTR_ERRMODE,
	PDO::ERRMODE_EXCEPTION
);

//Consulta
$query     = "SELECT 

campo,valor FROM ventas";
$statement = $conexion->prepare($query);
$statement->execute();

//Array
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

//var_dump($result);

//JSON
//echo json_encode($result);

//Recorrer Arreglo
$json = array();
foreach ($result as $key => $value) {
	
 $json[] = [
  
 'campo'=>$value['campo'],
 'valor'=>(float) $value['valor']

 ];

}

echo json_encode($json);

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


 ?>
<?php 

try {
	
//Conexión a  BD
$conexion =  new PDO(

'mysql:host=localhost;dbname=test',
'root',
'',
array(

PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'

)
);

$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//Consulta

$query     = "SELECT * FROM trabajadores";
//SENTENCIA PREPARADA
$statement = $conexion->prepare($query);
$statement->execute();

//Array ==  variable 
$result   = $statement->fetchAll(PDO::FETCH_ASSOC);

//JSON
$json     = [

"draw"=> 1,
"recordsTotal"=> count($result),
"recordsFiltered"=> count($result),
"data"=>$result

];

echo json_encode($json);

} catch (Exception $e) {
	
echo "Error ".$e->getMessage();

}






 ?>
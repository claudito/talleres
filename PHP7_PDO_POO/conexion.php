<?php 

try {
	
$conexion =  new PDO(
'mysql:host=localhost;dbname=tallerphp',
'root',
'',
array(
PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'
) 

);

//activar los mensajes de error y exepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$query     =  "SELECT * FROM usuario";
//sentencia Preparada
$statement =  $conexion->prepare($query);
$statement->execute();
$result    =  $statement->fetchAll();

foreach ($result as $key => $value) {

echo $value['id']." - ".$value['nombres']."<br>";


}



//var_dump($result);


} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

 ?>
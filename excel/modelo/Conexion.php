<?php 

class Conexion{

function get_conexion()
{
    
try

{

$conexion = new PDO(
    "mysql:host=localhost;dbname=db_test",//driver servidor base de datos
    "root",//usuario
    "",//contraseña
array(
PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"//ACTIVAR LA VALIDACIÓN DE CODIFICACIÓN UTF8
)
    
);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//ACTIVAR MENSAJES DE ERROR Y EXCEPCIÓN
return $conexion;//RETONAR LA CONEXIÓN


} catch (Exception $e) {
	
  echo "Error: ".$e->getMessage();//SE IMPRIME LOS ERRORES EN PANTALLA

  
}


}


}


?>
<?php 

class Conexion{


function get_conexion(){

try {
	
//creación del objeto de tipo PDO => API => interfaz de programación avanzada - serie de funciones que facilitan la vida(conexion a base de datos)
//PDO soporte con muchas M BD(mysql,sqlserver,postgresql,oracle,sqlite)
//Validación de UTF-8: ó , ñ , ü , etc
$conexion = new PDO(

'mysql:host=localhost;dbname=dompdf_db',
'root',
'',
array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8')

);
//activar los mensaje de error/exepcion de PDO
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//retonar la conexión/objeto de conexion
return $conexion;

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}




}




}






 ?>
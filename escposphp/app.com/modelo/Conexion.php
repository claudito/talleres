<?php 

class Conexion{

function get_conexion()
{

try {
	
$conexion =  new PDO(

'mysql:host=localhost;dbname=db_taller_escpos',
'root',
'',
array(
//ó ú ñ ü
PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES UTF8'

)

);

$conexion->setAttribute(

PDO::ATTR_ERRMODE,
PDO::ERRMODE_EXCEPTION

);

return $conexion;

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}




}


}


 ?>
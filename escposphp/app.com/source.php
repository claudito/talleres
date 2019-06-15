<?php 

include'modelo/Conexion.php';


$conexion = new Conexion();
$conexion = $conexion->get_conexion();

$opcion =  $_REQUEST['op'];

switch ($opcion) {
	case 1:
	 
	//CAB
try {

$query  =  "

SELECT 

id,
serie,
numero,
DATE_FORMAT(fecha,'%d/%m/%Y') fecha,
cliente,
ruc,
direccion,
CAST(subtotal AS DECIMAL(8,2))subtotal,
CAST(igv AS DECIMAL(8,2))igv,
CAST(total AS DECIMAL(8,2))total

FROM factura_cab  WHERE serie='F001' AND numero='0002104'
 ";	
$statement = $conexion->prepare($query);
$statement->execute();

//array
$cab      = $statement->fetch(PDO::FETCH_ASSOC);

echo json_encode($cab);


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}



		break;

	case 2:
	//DET
try {
	
$query =  "SELECT 

serie,
numero,
item,
codigo,
descripcion,
unidad,
CAST(cantidad as DECIMAL(8,2)) cantidad,
CAST(precio as DECIMAL(8,2)) precio 

FROM factura_det  WHERE serie='F001' AND numero='0002104' ";
$statement = $conexion->prepare($query);
$statement->execute();

//array
$det      = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($det);


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}
		break;
	
	default:
	echo "opción no disponible";
		break;
}




 ?>
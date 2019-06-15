<?php 

include'vendor/autoload.php';
include'modelo/Conexion.php';

date_default_timezone_set('America/Lima');

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

//Datos
$conexion = new Conexion();
$conexion = $conexion->get_conexion();

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

//var_dump($cab);

} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}

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

//var_dump($det);
/*
foreach ($det as $key => $value) {

echo $value['descripcion']."";


}
*/


} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}



$connector = new FilePrintConnector("\\\\192.168.1.6\\bixolon");
$printer   = new Printer($connector);

$printer -> text(date('d/m/Y H:i:s')."\n");
$printer -> text("N°: ".$cab['serie'].'-'.$cab['numero']."\n");
$printer -> text("Fecha: ".$cab['fecha']."\n");
$printer -> text("Cliente: ".$cab['cliente']."\n");
$printer -> text("Ruc: ".$cab['ruc']."\n");
$printer -> text("Dirección: ".$cab['direccion']."\n");
$printer -> text("---------------"."\n");
$printer -> text("Código Descripción Cantidad Precio"."\n");
foreach ($det as $key => $value) {
	
 $printer -> text($value['codigo'].' '.$value['descripcion'].' '.$value['cantidad'].' '.$value['precio']."\n");

}

$printer -> text("----------"."\n");

$printer -> text("SubTotal: ".$cab['subtotal']."\n");
$printer -> text("IGV: ".$cab['igv']."\n");
$printer -> text("Total: ".$cab['total']."\n");

$printer -> cut();
$printer -> close();



 ?>
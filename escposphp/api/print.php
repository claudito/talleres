<?php 

include'../vendor/autoload.php';

$cab =  json_decode($_REQUEST['cab'],true);

$det =  json_decode($_REQUEST['det'],true);


date_default_timezone_set('America/Lima');

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

try {

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
	







} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}





 ?>
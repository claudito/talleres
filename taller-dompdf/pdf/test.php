<?php 

#incluir / importar el archivo autoload de la carpeta vendor
include'../vendor/autoload.php';

//Importación de la conexion a la base de datos
include'../modelo/Conexion.php';
$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

// reference the Dompdf namespace
use Dompdf\Dompdf;

//Creación del objeto de tipo/clase dompdf
$dompdf = new Dompdf();

//Importación de la Plantilla

ob_start(); //importar un contenido y no imprimirlo

include'plantilla2.php'; //Página que contiene la plantilla

$html = ob_get_clean();//guardar el contenido  importado en una variable

//Llamado de la función que convierte una texto html en PDF
$dompdf->loadHtml($html);

//Orientación Vertical / Horizontal
//setPaper(tamaño,orientación )
//$dompdf->setPaper('A4', 'landscape');//horizontal
  $dompdf->setPaper('A4', 'letter');//vertical

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
//$dompdf->stream();

//$dompdf->stream('Reporte de Ventas.pdf'); //Descarga Automatica del PDF

$dompdf->stream(
	
	'Reporte de Ventas.pdf',
	array('Attachment'=>0)

      ); //Vista Previa sin descarga


//Guardar el PDF en una Carpeta

$pdf     =  $dompdf->output();//recuperar el PDF Generado

//20190518173400
$filename =  '../uploads/'.date('YmdHis').'.pdf';

//Guardar en Carpeta
//file_put_contents($filename,$pdf);


 ?>
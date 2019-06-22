<?php 

include'../vendor/autoload.php';
include'../modelo/Conexion.php';

$conexion  = new Conexion();
$conexion  = $conexion->get_conexion();

$fechaini = $_REQUEST['fechaini'];
$fechafin = $_REQUEST['fechafin'];

try {
	
$query = "SELECT  
codigo,
nombres,
apellidos,
dni,
fecha_ingreso

FROM empleados WHERE fecha_ingreso  BETWEEN :fechaini AND :fechafin";
$statement = $conexion->prepare($query);
$statement->bindParam(':fechaini',$fechaini);
$statement->bindParam(':fechafin',$fechafin);
$statement->execute();
$result = $statement->fetchAll();

if(count($result)>0)
{

$objPHPExcel = new PHPExcel();

//Asignar propiedades al archivo
$objPHPExcel->getProperties()->setCreator('Luis Claudio')
                             ->setTitle('Reporte de Empleados');

//Configuración del título y cabecera

$titulo = "Reporte de Empleados";

$columnas = array('Código','Nombre','Apellidos','Dni','Fecha de Ingreso');

//Agregar el título y columnas al Excel

//$objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1',$titulo)
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1',$columnas[0])
->setCellValue('B1',$columnas[1])
->setCellValue('C1',$columnas[2])
->setCellValue('D1',$columnas[3])
->setCellValue('E1',$columnas[4]);                 

//Agregar el Detalle al Excel

$i = 2 ;

foreach ($result as $key => $value) {

$objPHPExcel->setActiveSheetIndex(0)
->setCellValueExplicit('A'.$i,$value['codigo'])
->setCellValueExplicit('B'.$i,$value['nombres'])
->setCellValueExplicit('C'.$i,$value['apellidos'])
->setCellValueExplicit('D'.$i,$value['dni'])
->setCellValueExplicit('E'.$i,$value['fecha_ingreso']);


$i++;

}


//Asignamos un nombre  a la hoja
$objPHPExcel->getActiveSheet()->setTitle('Lista de Empleados');

//Se active la hoja al momento de abrir el archivo
$objPHPExcel->setActiveSheetIndex(0);


//Parametros de configuración para crear el archivo Excel 
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Reporte de Empleados.xlsx"');
header('Cache-Control: max-age=0');

//Exportar El documento Excel
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;

}
else
{

echo "no existe información disponible";

}



} catch (Exception $e) {
	
echo "Error: ".$e->getMessage();

}




 ?>
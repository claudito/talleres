<?php 

include'../vendor/autoload.php';

include'../modelo/Conexion.php';

$conexion =  new Conexion();
$conexion =  $conexion->get_conexion();

//var_dump($_FILES);
//echo $_FILES['archivo']['type'];

//Número de Filas
$filas = $_REQUEST['filas'];

//Extensión
$extension = pathinfo($_FILES['archivo']['name'],PATHINFO_EXTENSION);

if($extension=='xlsx')
{

//Nombre del Archivo
$archivo = $_FILES['archivo']['name'];

//Tipo
$tipo    = $_FILES['archivo']['type'];

//Destino(Archivo Temporal el servidor)
$destino = "bak_".$archivo;

if(copy($_FILES['archivo']['tmp_name'],$destino))
{
 
// $titulo = "archivo Subido";

}
else
{
  
// $titulo =  "error";

}

//validar si el archivo temporal existe
if(file_exists($destino))
{
 // $titulo =  "si existe el archivo Temporal";

//objeto de lectura phpexcel(xlsx)
$objReader = new PHPExcel_Reader_Excel2007();
//cargar el archivo Excel
$objPHPExcel = $objReader->load($destino);

//Configuración de manejo de fechas
$objFecha  = new PHPExcel_Shared_Date();

//activo la lecttura del archivo excel
$objPHPExcel->SetActiveSheetIndex(0);

//Leer el Excel y voy agregar los elementos a un array asociativo


for ($i=2 ; $i<=$filas;$i++){

$_DATOS[$i]['a'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();

$_DATOS[$i]['b'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();

$_DATOS[$i]['c'] = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();

$_DATOS[$i]['d'] = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();

$_DATOS[$i]['e'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();


}


}
else
{
 // $titulo =  "no existe";

}


//Insertar datos a nuestra BD
foreach ($_DATOS as $key => $value) {

try {
	
$query = "INSERT INTO empleados
(codigo,nombres,apellidos,dni,fecha_ingreso)
VALUES
(:a,:b,:c,:d,:e)";
$statement = $conexion->prepare($query);
$statement->bindParam(':a',$value['a']);
$statement->bindParam(':b',$value['b']);
$statement->bindParam(':c',$value['c']);
$statement->bindParam(':d',$value['d']);
$statement->bindParam(':e',$value['e']);
$statement->execute();


} catch (Exception $e) {

echo "Error: ".$e->getMessage();	
	
}

}




//Eliminar  el Archivo Temporal del Servidor
unlink($destino);

//Mensaje
echo  json_encode(

array(

'title'=>'Buen Trabajo',
'text' =>'Registro Importado Correctamente',
'type' =>'success'

)

);


}
else
{

echo  json_encode(

array(

'title'=>'Error',
'text' =>'Extensión no permitida',
'type' =>'error'

)

);

}



 ?>
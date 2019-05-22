<?php 

include'vendor/autoload.php';
include'modelo/Conexion.php';

$conexion  = new Conexion();
$conexion  = $conexion->get_conexion();

$opcion  = $_REQUEST['opcion'];

switch ($opcion) {
	case 1:

$prefijo = trim($_REQUEST['prefijo']);
$numero  = trim($_REQUEST['numero']);
$mensaje = trim($_REQUEST['mensaje']);

try {
	
$basic  = new \Nexmo\Client\Credentials\Basic('2a53296e', 'NkiHNG0HpaV7wfUC');

$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' => $prefijo.$numero,
    'from' => 'Nexmo',
    'text' => $mensaje
]);

echo  json_encode(

array(

'title'=>'Buen Trabajo',
'text' =>'Mensaje Enviado',
'type' =>'success'

)


);
	

} catch (Exception $e) {

echo  json_encode(

array(

'title'=>'Error',
'text' =>$e->getMessage(),
'type' =>'error'

)


);


}


		break;

 case 2:

 try {
 	
 $query     = "SELECT * FROM clientes";
 $statement = $conexion->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll(PDO::FETCH_ASSOC);

 echo json_encode($result);


 } catch (Exception $e) {
 	
 echo "Error: ".$e->getMessage();

 }


 break;


 case 3:

 $mensaje = trim($_REQUEST['mensaje']);

 if(isset( $_REQUEST['numero']))
 {
 
 foreach ($_REQUEST['numero'] as $key => $numero) {
  

  try {


  $basic  = new \Nexmo\Client\Credentials\Basic('2a53296e', 'NkiHNG0HpaV7wfUC');

$client = new \Nexmo\Client($basic);

$message = $client->message()->send([
    'to' =>   $numero,
    'from' => 'Nexmo',
    'text' => $mensaje
]);

  } catch (Exception $e) {
  	
  echo  json_encode(

array(

'title'=>'Error',
'text' =>$e->getMessage(),
'type' =>'error'

)


);




  }


 }

echo  json_encode(

array(

'title'=>'Buen Trabajo',
'text' =>'Mensajes Enviados',
'type' =>'success'

)


);




 }
 else
 {

echo  json_encode(

array(

'title'=>'Lista Vacía',
'text' =>'Selecciona un cliente',
'type' =>'warning'

)


);




 }



 break;

	
	default:
echo "opción no disponible";
		break;
}








 ?>
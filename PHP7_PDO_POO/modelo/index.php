<?php 

include'Conexion.php';
include'Usuario.php';

$usuario =  new Usuario();

$nombres          =  'Luis';
$apellidos        =  'Ponce';
$dni              =  '46794294';
$direccion        =  'Jesús María';
$fecha_nacimiento =  '1990-09-09';
$id               =   1;

//insertar 
echo $usuario->insertar($nombres,$apellidos,$dni,$direccion,$fecha_nacimiento);

//actualizar
echo $usuario->actualizar($id,$nombres,$apellidos,$dni,$direccion,$fecha_nacimiento);

//eliminar
echo $usuario->eliminar($id);


 ?>
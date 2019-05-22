<?php 

include'Conexion.php';
include'Usuario.php';

$usuario    =  new Usuario();
$consulta   =  $usuario->consulta(1);

//var_dump($consulta);

 ?>
 <ul>
 <li>id:      <?php echo $consulta['id']; ?></li>
 <li>nombres: <?php echo $consulta['nombres']; ?></li>
 <li>apellidos: <?php echo $consulta['apellidos']; ?></li>
 </ul>
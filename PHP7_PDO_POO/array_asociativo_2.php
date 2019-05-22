<?php 
$usuario1 = array(

'codigo'   =>'001',
'nombres'  =>'Luis Augusto',
'apellidos'=>'Claudio Ponce'

);

$usuario2 = array(

'codigo'   =>'002',
'nombres'  =>'Juan',
'apellidos'=>'Perez'

);

$usuario3 = array(

'codigo'   =>'003',
'nombres'  =>'Pedro',
'apellidos'=>'Torres'

);

$lista =  array 
(

$usuario1,
$usuario2,
$usuario3

);

//var_dump($lista);

foreach ($lista as $key => $value) {
	
  echo $value['codigo'].' - '.$value['nombres']."<br>";

}





 ?>
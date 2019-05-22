<?php 

$array = array(

'codigo'=>'001',
'nombres'=>'Luis Augusto',
'apellidos'=>'Claudio Ponce'

);

//var_dump($array);

//echo $array['nombres'];
foreach ($array as $key => $value) {
	
echo $key.': '.$value."<br>";

}



 ?>
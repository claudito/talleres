<?php 

class Usuario extends Conexion {


function lista()
{

try {

$conexion  =  $this->get_conexion();
$query     =  "SELECT * FROM usuario";
$statement =  $conexion->prepare($query);
$statement->execute();
$result    =  $statement->fetchAll(PDO::FETCH_ASSOC);
return $result;
	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}

function consulta($id)
{

try {

$conexion  = $this->get_conexion();
$query     = "SELECT id,nombres,apellidos,dni,direccion,fecha_nacimiento,fecha_creacion FROM usuario WHERE id=:idx";
$statement =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
$result    = $statement->fetch(PDO::FETCH_ASSOC);
return $result;

} catch (Exception $e) {

//echo "Error: ".$e->getMessage()."<br> File: ".$e->getFile()."<br> Line: ".$e->getLine()."<br>".$e->getCode()."<br>".$e->getTrace();

 var_dump($e);
	
}


}


function insertar($nombres,$apellidos,$dni,$direccion,$fecha_nacimiento)
{

try {
$conexion = $this->get_conexion();
$query    = "INSERT INTO usuario 
(
nombres,
apellidos,
dni,
direccion,
fecha_nacimiento
)
VALUES
(
:nombres,
:apellidos,
:dni,
:direccion,
:fecha_nacimiento
)";
$statement =  $conexion->prepare($query);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':dni',$nombres);
$statement->bindParam(':direccion',$direccion);
$statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$statement->execute();
return "ok";
	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}

function actualizar($id,$nombres,$apellidos,$dni,$direccion,$fecha_nacimiento)
{

try {
$conexion = $this->get_conexion();
$query    = "UPDATE usuario SET 
nombres          =:nombres,
apellidos        =:apellidos,
dni              =:dni,
direccion        =:direccion,
fecha_nacimiento =:fecha_nacimiento
WHERE
id=:id";
$statement =  $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->bindParam(':nombres',$nombres);
$statement->bindParam(':apellidos',$apellidos);
$statement->bindParam(':dni',$nombres);
$statement->bindParam(':direccion',$direccion);
$statement->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$statement->execute();
return "ok";


	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}

}


function eliminar($id)
{

try {
$conexion = $this->get_conexion();
$query    = "DELETE FROM usuario WHERE id=:id";
$statement= $conexion->prepare($query);
$statement->bindParam(':id',$id);
$statement->execute();
return "ok";

	
} catch (Exception $e) {

echo "Error: ".$e->getMessage();
	
}


}







}

 ?>
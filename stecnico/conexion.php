<?php
$server  = "localhost";//nombre del servidor
$cliente = "select";//nombre del cliente
$pwd     = "123456";//contraseña de mysql
$db      = "microtex";//nombre de la base de datos, en nuestro caso se llama autocompleta

$conexion = mysqli_connect($server,$cliente,$pwd);

	if($conexion){

		//echo "conectado<br>";

	}else{

		//echo "No hay Conexion";

}

$base = mysqli_select_db($conexion,$db);

	if($base){

		//echo "Conectado a las base de datos: ".$db;

	}else{

		//echo "Error en la base de datos";
}

?>

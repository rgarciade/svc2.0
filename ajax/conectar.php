<?php 
include "../config/conexion.php";
$nombre = $_POST['nombre'];
$texto = $_POST['texto'];



mysqli_query ($conexion,"INSERT INTO `servicios`(`N_CLIENTE`,`TEXTO`) VALUES ('$nombre','$texto')")
					or die("Error en la consulta SQL2");
echo "200";

 ?>
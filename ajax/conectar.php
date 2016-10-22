<?php 
include "../config/conexion.php";
$nombre = $_POST['nombre'];
$texto = $_POST['texto'];


$consulta = "INSERT INTO `servicios`(`N_CLIENTE`,`TEXTO`) VALUES (?,?)";
$sentencia = mysqli_prepare($conexion, $consulta);

mysqli_stmt_bind_param($sentencia, "ss", $nombre, $texto);

/* Ejecutar la sentencia */
mysqli_stmt_execute($sentencia)or die("Error en la consulta SQL2");

echo "200";
/* cerrar la sentencia */
mysqli_stmt_close($sentencia);

 ?>
<?php
$server  = "localhost";//nombre del servidor
$cliente = "select";//nombre del cliente
$pwd     = "123456";//contraseña de mysql
$db      = "servicios";//nombre de la base de datos, en nuestro caso se llama autocompleta

$conexion = mysqli_connect($server,$cliente,$pwd,$db);

?>

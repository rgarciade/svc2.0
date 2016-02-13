<?php 
include("cabezerabusquedas.php");
include("../funciones/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

# ################################### #

 #CONSULTA		


						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 AND FECHA <= '$fe2' AND FECHA>='$fe1' ORDER BY FECHA DESC,HORA_FIN DESC")
or die("Error en la consulta SQL");						
#####nªfilass
$numero_filas = mysqli_num_rows($consulta1);
 if ($numero_filas == 0 ) {
#Cerramos la conexión con la base de datos
mysqli_close($conexion);
header('location:../rutas/BUSQUEDAS.PHP?as=ERROR3');
}else{
#echo "hay registros";

ECHO "IMPRIMIRRRR";
header("location:../rutas/EXCEL2.PHP?usu=$usu&fe1=$fe1&fe2=$fe2");
}


?>
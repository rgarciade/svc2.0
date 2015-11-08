<?php 
include("cabezerabusquedas.php");
#CONEXION

#Conectamos con mysqli
$conexion = mysqli_connect("localhost","select","123456")
or die ("Fallo en el establecimiento de la conexión");


#Seleccionamos la base de datos a utilizar
mysqli_select_db($conexion,"microtex")
or die("Error en la selección de la base de datos");


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
header('location:../BUSQUEDAS.PHP?as=ERROR3');
}else{
#echo "hay registros";

ECHO "IMPRIMIRRRR";

header("location:../EXCEL2.PHP?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
}


?>
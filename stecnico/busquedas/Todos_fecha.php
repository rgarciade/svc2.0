<?php 
include("cabezerabusquedas.php");#CONEXION
//se incluyen los datos para realizar la conexion a su base de datos
# ################################### #
?>
<?php #CONSULTA		


						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE  FECHA <= '$fe2' AND FECHA>='$fe1'  ORDER BY FECHA DESC,HORA_FIN DESC")
or die("Error en la consulta SQL");						
#####nªfilass
$numero_filas = mysqli_num_rows($consulta1);
 if ($numero_filas == 0 ) {
#Cerramos la conexión con la base de datos
mysqli_close($conexion);
       $error = true;
}else{
#echo "hay registros";

}
if ($error) {
    echo "</table>";mostrarerror();
}
include("inferiorbusquedas.php");

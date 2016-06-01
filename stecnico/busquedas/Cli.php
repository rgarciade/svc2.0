<?php #CONEXION
include("cabezerabusquedas.php");
# ################################### #
 #CONSULTA		
?>

<?PHP

						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 ORDER BY FECHA DESC,HORA_FIN DESC")
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
include("inferiorbusquedas.php");
if ($error) {
    echo "</table>";mostrarerror();
}
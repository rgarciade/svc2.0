<?php 
include("cabezerabusquedas.php");#CONEXION
# ################################### #
?>
<?php #CONSULTA		


						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios`  ORDER BY FECHA DESC,HORA_FIN DESC")
or die("Error en la consulta SQL");						
#####nªfilass
$numero_filas = mysqli_num_rows($consulta1);
 if ($numero_filas == 0 ) {
#Cerramos la conexión con la base de datos
mysqli_close($conexion);
header('location:../rutas/BUSQUEDAS.PHP?as=ERROR3');
}else{
#echo "hay registros";

}
if ($error) {
    echo "</table>";mostrarerror();
}
include("inferiorbusquedas.php");

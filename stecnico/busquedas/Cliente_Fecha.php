<?php 
include("cabezerabusquedas.php"); #CONEXION
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
      $error = true;
    }
include("inferiorbusquedas.php");
if ($error == true) {
    echo "</table>";mostrarerror();
}
?>


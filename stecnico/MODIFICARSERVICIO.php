<html >
<?PHP 
include("funciones/funciones.php");
#DATOS MODIFICAR
 $cli 	=$_POST['N_CLIENTE'];
 $con 	=$_POST['CONTACTOS'];
 $tec 	=$_POST['N_TECNICO'];
 $sop 	=$_POST['SOPORTE'];
 $hini 	=$_POST['HORA_INICIO'];
 $hfin 	=$_POST['HORA_FIN'];
 $fech 	=$_POST['FECHA'];
 $tex 	=$_POST['TEXTO'];
 $pie 	=$_POST['PIEZAS'];
 $ser 	=$_POST['NUM_SERVICIO'];

?>


<?php #CONEXION
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

# ################################### #
?>
<?php #CONSULTA		
						##############################
						#Efectuamos la consulta SQL####
						#############################
						
						
$modi =  mysqli_query ($conexion,"update `servicios` set `N_CLIENTE`='$cli', `CONTACTOS`='$con', `TECNICO`='$tec',`SOPORTE`='$sop',
 `HORA_INICIO`='$hini', `HORA_FIN`='$hfin',`FECHA`='$fech',`TEXTO`='$tex', `PIEZAS`='$pie' WHERE NUM_SERVICIO='$ser'")				
or die("Error en la consulta SQL modificar4 ");

#Cerramos la conexión con la base de datos
mysql_close($conexion);

header('location:index.php');

?>

<body>
</body>
</html>
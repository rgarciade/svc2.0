<html >
<?PHP 
include("../funciones/comun.php");
include("../funciones/funciones.php");
#DATOS MODIFICAR
if (isset($_POST['N_CLIENTE'])) {
	$cli 	= $_POST['N_CLIENTE'];
}
if (isset($_POST['CONTACTOS'])) {
	$con 	= $_POST['CONTACTOS'];
}
if (isset($_POST['Tecnico'])) {
	$tec 	= $_POST['Tecnico'];
}
if (isset($_POST['SOPORTE'])) {
	$sop 	= $_POST['SOPORTE'];
}
if (isset($_POST['HORA_INICIO'])) {
	$hini 	= $_POST['HORA_INICIO'];
}
if (isset($_POST['HORA_FIN'])) {
	$hfin 	= $_POST['HORA_FIN'];
}
if (isset($_POST['FECHA'])) {
	$fech 	= $_POST['FECHA'];	
}
if (isset($_POST['TEXTO'])) {
	$tex 	= $_POST['TEXTO'];
}
if (isset($_POST['PIEZAS'])) {
	$pie 	= $_POST['PIEZAS'];	
}
if (isset($_POST['NUM_SERVICIO'])) {
	$ser 	= $_POST['NUM_SERVICIO'];
}


if (isset($_POST['borrar'])) {
	$borrar = true;
}else{
	$borrar = false;
}

include("../../config/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

# ################################### #
?>
<?php #CONSULTA		
						##############################
						#Efectuamos la consulta SQL####
						#############################
						
if ($borrar == false) {
	//modificar
	mysqli_query ($conexion,"update `servicios` set `N_CLIENTE`='$cli', `Estado`=NULL, `CONTACTOS`='$con', `TECNICO`='$tec',`SOPORTE`='$sop',
				 	`HORA_INICIO`='$hini', `HORA_FIN`='$hfin',`FECHA`='$fech',`TEXTO`='$tex', `PIEZAS`='$pie' WHERE NUM_SERVICIO='$ser'")				
	or die("Error en la consulta SQL modificar ");	
	header('location:index.php');	
}else{
	//borrar
echo"$ser";
	mysqli_query ($conexion,"DELETE FROM `servicios` WHERE `NUM_SERVICIO`= '$ser'")
	or die("Error en la consulta SQL borrado");
		header('location:index.php');
}			





?>

<body>
</body>
</html>
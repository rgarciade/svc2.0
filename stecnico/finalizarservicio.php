<html>
<head></head>
<body>

<?PHP
 
 $NUM_SER=$_POST['NUM_SERVICIO'];
 $TEXTO=$_POST['TEXTO'];
 $N_TECNICO=$_POST['N_TECNICO'];
$hora=date('H:i'); 
?>

<?php
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos


#Seleccionamos la base de datos a utilizar
mysqli_select_db($conexion,"microtex")
or die("Error en la selección de la base de datos");


?><div nombre="nuevo">
<?PHP

$modi =  mysqli_query ($conexion,"UPDATE `servicios` SET `HORA_FIN`='$hora',`Estado`=NULL, `TECNICO`='$N_TECNICO' ,`TEXTO`='$TEXTO' WHERE `NUM_SERVICIO`='$NUM_SER'")				
or die("Error en la consulta SQL modificar4 ");
mysqli_close($conexion);
header('location:index.php');



?>
</div>
</body>
</html>
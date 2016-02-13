<?php include("../funciones/comun.php");
include("../funciones/funciones.php");
include("cabezerabusquedas.php"); #CONEXION
# ################################### #
?>
<?php #CONSULTA		


						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE TECNICO='$tec' and FECHA <= '$fe2' AND FECHA>='$fe1'  ORDER BY FECHA DESC,HORA_FIN DESC")
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
#######rewsultados
while( $row = mysqli_fetch_array ( $consulta1 )) {
$row [ "NUM_SERVICIO" ];
 $a=$row [ "NUM_SERVICIO" ];
echo "<tr>";

              $cli  = Element_tabla($row,"N_CLIENTE");

              $con  = Element_tabla($row,"CONTACTOS");

              $tec  = Element_tabla($row,"TECNICO");

              $sop  = Element_tabla($row,"SOPORTE");

              $hini = Element_tabla($row,"HORA_INICIO");

              $hfin = Element_tabla($row,"HORA_FIN");

              $fech = Element_tabla($row,"FECHA");

              $tex  = Element_tabla($row,"TEXTO");

              $pie  = Element_tabla($row,"PIEZAS");

              $ser  = Element_tabla($row,"NUM_SERVICIO");

echo "<td>";





?>


<form action="formulariomodificar.php" method="POST">
<input type="hidden" name="cli" value="<?PHP echo $cli ?>">
<input type="hidden" name="con" value="<?PHP echo $con ?>">
<input type="hidden" name="tec" value="<?PHP echo $tec ?>">
<input type="hidden" name="sop" value="<?PHP echo $sop ?>">
<input type="hidden" name="hini" value="<?PHP echo $hini ?>">
<input type="hidden" name="hfin" value="<?PHP echo $hfin ?>">
<input type="hidden" name="fech" value="<?PHP echo $fech ?>">
<input type="hidden" name="tex" value="<?PHP echo $tex ?>">
<input type="hidden" name="pie" value="<?PHP echo $pie ?>">
<input type="hidden" name="ser" value="<?PHP echo $ser ?>">
<input type="submit" value=""/>
 <!--<input type="button" value="" onClick="window.location.href='formulariomodificar.html'">-->
</form>
 <?php 
echo "</td>";
}
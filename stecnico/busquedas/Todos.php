<?php include("cabezerabusquedas.php");?>
<?php #CONEXION

#Conectamos con mysqli
$conexion = mysqli_connect("localhost","select","123456")
or die ("Fallo en el establecimiento de la conexión");


#Seleccionamos la base de datos a utilizar
mysqli_select_db($conexion,"microtex")
or die("Error en la selección de la base de datos");


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
header('location:BUSQUEDAS.PHP?as=ERROR3');
}else{
#echo "hay registros";

}
#######rewsultados
while( $row = mysqli_fetch_array ( $consulta1 )) {
$row [ "NUM_SERVICIO" ];
 $a=$row [ "NUM_SERVICIO" ];
echo "<tr>";

echo "<td width='200' height='50'><div style='text-transform: uppercase;position:relative;width:200;height:50; overflow:auto'> ";
 echo $row [ "N_CLIENTE" ];
    $cli=$row [ "N_CLIENTE" ];
echo "</div></td>";

echo "<td width='200' height='50'><div style='text-transform: uppercase;position:relative;width:200;height:50; overflow:auto'> ";
 echo $row [ "CONTACTOS" ];
     $con=$row [ "CONTACTOS" ];
echo "</div></td>";

echo "<td>";
 echo $row [ "TECNICO" ];
      $tec=$row [ "TECNICO" ];
echo "</td>";

echo "<td>";
 echo $row [ "SOPORTE" ];
      $sop=$row [ "SOPORTE" ];
echo "</td>";

echo "<td>";
 echo $row [ "HORA_INICIO" ];
      $hini=$row [ "HORA_INICIO" ];
echo "</td>";

echo "<td>";
 echo $row [ "HORA_FIN" ];
      $hfin=$row [ "HORA_FIN" ];
echo "</td>";
echo "<td>";
 echo $row [ "FECHA" ];
      $fech=$row [ "FECHA" ];
echo "</td>";

echo "<td width='150' height='10'> <div style='text-transform: uppercase;position:relative;width:150;height:60; overflow:auto'>";
 echo $row [ "TEXTO" ];
      $tex=$row [ "TEXTO" ];
echo "</div></td>";

echo "<td width='200' height='10'><div style='text-transform: uppercase;position:relative;width:150;height:50; overflow:auto'> ";
 echo $row [ "PIEZAS" ];
      $pie=$row [ "PIEZAS" ];
echo "</div></td>";

echo "<td>";
 echo $row [ "NUM_SERVICIO" ];
	  $ser=$row [ "NUM_SERVICIO" ];

echo "</td>";
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
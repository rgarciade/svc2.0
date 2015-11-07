<div name="comun">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
  <script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
  <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
  <script language="javascript" src="js/jquery.js"></script>
  <link type="text/css" href="indexcss.css" rel="stylesheet" />

<div id='cssmenu'>
  <ul>
     <li ><a href='index.PHP'><span>STECNICO</span></a></li>
     <li ><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
     <li class='last'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
     <li class='vol'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
     <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
  </ul>
</div>

</div>

<html >



<?PHP #DATOS MODIFICAR
  if( isset($_POST['SBUSCAR'])){
  $acc=$_POST['SBUSCAR'];
  }

  if (isset($_POST['N_CLIENTE'])) {
   $usu=$_POST['N_CLIENTE'];
  }else{
   $usu="";
  }
  if (isset($_POST['FECHA1'])) {
   $fe1=$_POST['FECHA1'];
  }else{
   $fe1="";
  }
  if (isset($_POST['FECHA2'])) {
   $fe2=$_POST['FECHA2'];
  }else{
   $fe2="";
  }
  if (isset($_POST['N_TECNICO'])) {
   $tec=$_POST['N_TECNICO'];
  }else{
   $tec="";
  }





 $tec=$_POST['N_TECNICO'];

 
switch ($acc) {
  case "CLI_FECHA" :
    header("location:./busquedas/Cliente_Fecha.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;

  case "IMPRIMIR":  
     header("location:./busquedas/Imprimir.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
}
 




 //TODOS
if ($acc =="TODOS" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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
}}

?>
</tr>

</div>
</table>
</div>


<?php #TODOS_FECHA
if ($acc =="TODOS_FECHA" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE  FECHA <= '$fe2' AND FECHA>='$fe1'  ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>
</table>
</div>

<?php #TODOS_FECHA_TECNICO
if ($acc =="TODOS_FECHA_TECNICO" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE TECNICO='$tec' and FECHA <= '$fe2' AND FECHA>='$fe1'  ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>
</table>
</div>


<?php #TODOS_TECNICO
if ($acc =="TODOS_TECNICO" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE TECNICO= '$tec'  ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>
</table>
</div>

<?php #BUSCAR TECNICO
if ($acc =="CLI_FECHA_TECNICO" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 AND FECHA <= '$fe2' AND FECHA>='$fe1' AND TECNICO='$tec' ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>
</table>
</div>

<?php #BUSCAR TECNICO
if ($acc =="CLI_TECNICO" ){ 
 
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 AND TECNICO='$tec' ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>
</table>
</div>
<?PHP
if ($acc =="CLI" ){ 
 if ($usu ==""){#Cerramos la conexión con la base de datos
    mysqli_close($conexion);
    header('location:BUSQUEDAS.PHP?as=ERROR3');}
?>
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
  <td>N_CLIENTE</td>
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td >TEXTO</td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
    <td></td>
</tr>


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

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 ORDER BY FECHA DESC,HORA_FIN DESC")
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
}}

?>
</tr>

</div>

</table>

</div>
<!--
<a href="BUSQUEDAS.PHP"><input class="classname"type="submit" value="VOLVER"></a>--> 
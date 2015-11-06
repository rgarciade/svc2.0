<! Doctipe html>

<body>
<div name="comun">
<!--refresco cada x tiempo-->
<meta http-equiv="refresh" content="60">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="indexcss.css" rel="stylesheet" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />


<STYLE>
body { margin-top: -4px; margin-right: 0px; margin-bottom: 1px; margin-left: -10px }
</STYLE>


<script language="javascript" src="js/jquery.js"></script>

<div name="formula predictiva">
<?php #busqueda predictiva
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$con = "select cliente from clientes";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysqli_query($conexion,$con);
	?>
    
    <script type="text/javascript">
	function abrirVentana(url) {

    window.open(url, "nuevo", "directories=no,location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=809, height=250");
	
}
	$(function() {
		
		<?php
		
		while($row= mysqli_fetch_array($query)) {//se reciben los valores y se almacenan en un arreglo
      $elementos[]= '"'.$row['cliente'].'"';
	  
}
$arreglo= implode(", ", $elementos);//junta los valores del array en una sola cadena de texto

		?>	
		var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
				
		$( "#tags" ).autocomplete({
			source: availableTags
		});
		
	});

	</script>
</div>
<!--cerrar formula predictiva-->

<?php
## zona horaria por defecto
date_default_timezone_set("Europe/Madrid");

?>
<!--no enviar formulario con enter-->
<script language="javascript">
$(document).ready(function() {

  $('form').keypress(function(e){   
    if(e == 13){
      return false;
    }
  });

  $('input').keypress(function(e){
    if(e.which == 13){
      return false;
    }
  });

});
</script>

<div name="cabecera">
<!--PARTE SUPERIOR-->

<?PHP
#Conectamos con MySQL
			$conexion = mysqli_connect("localhost","select","123456")
				or die ("Fallo en el establecimiento de la conexión");


#Seleccionamos la base de datos a utilizar
			mysqli_select_db($conexion,"microtex")
			or die("Error en la selección de la base de datos");
			
 #comprovamos servicios activos actuales
$result1 = mysqli_query ($conexion,"SELECT * FROM servicios where Estado is not NULL")
			or die("Error en la consulta SQL");
$srva=0;

while( $row = mysqli_fetch_array ( $result1 )) {
	$row [ "NUM_SERVICIO" ];
	$srva=$srva+1;
			} 
			if ($srva > 7){
				$srva="7+";
			}	
	
 ?>
<div id='cssmenu'>
<ul>
   <li class='active'><a href='index.PHP'><span>STECNICO</span></a></li>
   <li><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
   <li class='last'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
   
  
   <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
   <li class='vol'><a  href='#' onClick="abrirVentana('CREARSERVACTIVO.PHP')"><span>NUEVO SERV ACTIVO</span></a></li>

 <a href='SERVICIOSACTIVOS.php'><img  src='images/srvactivos/<?PHP echo $srva?>.png' width='120px' height='50px'></a>

</ul>
</div>
<!--cerrar cssmenu-->
</div>
<!--cerrar cabecera-->
</div>
<!--cerar comun-->

<!--ZONA INFERIOR-->
<div class="CSSTableGenerator1" >
<table style="width: 100%">
<!--formulario nuevo servicio-->
<?PHP #variables en blanco
$noex="";

if( isset($_GET['error']))
{
$error="EL CLIENTE NO EXISTE";

}else{
$error="";}


?>
<form action="crearservicio.php" method="post">
<tr><td align="center" colspan="6">cabecera</td></tr>
<tr HEIGHT="25">
<!--espacio-->
</tr>
<!--primera linea-->
<tr>
<td><h3>nombre</td>
<td><br><input  id="tags" name="N_CLIENTE"  class="mayusculas" required>
		<div nombre="nuevo">	<br><?PHP echo $error;?></div>	</td>
		

<td><h3>soporte</td>
<td><select class="mayusculas" name="SOPORTE"pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
  <option></option>
  <option>PRESENCIAL</option>
  <option>REMOTO</optcion>
  </select>
   </td>
   <td><h3>fecha</td>
   <td><input class="mayusculas" type="date" name="FECHA" value="<?php echo date('Y-m-d'); ?>" /></td>
</tr>
<!--segundalinea-->
<tr>
<td><h3>contacto</td>

<td><br><input type="text" name="CONTACTOS"  class="mayusculas"/><br><br></td>
<td><h3>hora inicio</td>
 <td><input class="mayusculas" type="datetime" name="HORA_INICIO" value="<?php echo date('H:i'); ?>"/></td>
<td><h3>texto</td>
  <td><input class="mayusculas" type="text" name="TEXTO"  /></td>
</tr>
<!--tercera linea-->
<tr>
<td><h3>tecnico</td>
<td > <select class="mayusculas" name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
   <option></option>
  <option>JORGE</option>
  <option>DAVID</option>
  <option>RAUL</option>
  <option>JOSE</option>
  </select>
   </td>
   <td><h3>hora fin</td>
   <td><input class="mayusculas" type="datetime" name="HORA_FIN" value="<?php echo date('H:i'); ?>" /></td>
   <td><h3>piezas</td>
   <td><input class="mayusculas" type="text" name="PIEZAS"  /></td>
</tr>
<tr HEIGHT="25">
<!--espacio-->
</tr>
<input class="mayusculas" type="hidden" name="srv" value="0">
<tr><td  align="center" colspan="6"><input class="mayusculas" type="submit" value="insertar"/></td></tr>
</form>
</table>
</div><!--tabla1-->
  <div class="CSSTableGenerator" >
 <table style="width: 100%" >
<tr colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
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

   <!--BUCLE TABLA-->
<div ="bucle ultimosx">
<?PHP

# ################################### #
			


						##############################
						#Efectuamos la consulta SQL####
						#############################
			$result = mysqli_query ($conexion,"SELECT * FROM servicios order by NUM_SERVICIO DESC LIMIT 15")
			or die("Error en la consulta SQL");

						###################################
						#Mostramos los resultados obtenidos
						###################################
?>					

<?PHP				
while( $row = mysqli_fetch_array ( $result )) {
	$row [ "NUM_SERVICIO" ];
	$a=$row [ "NUM_SERVICIO" ];
echo "<tr>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "N_CLIENTE" ];
    $cli=$row [ "N_CLIENTE" ];
echo "</div></td>";

echo "<td width='150' height='10'> <br><br><br><div style='text-transform: uppercase;position:relative;width:150;height:60; overflow:auto'>";
 echo $row [ "CONTACTOS" ];
     $con=$row [ "CONTACTOS" ];
echo "</div></td>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "TECNICO" ];
      $tec=$row [ "TECNICO" ];
echo "</div></td>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "SOPORTE" ];
      $sop=$row [ "SOPORTE" ];
echo "</div></td>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "HORA_INICIO" ];
      $hini=$row [ "HORA_INICIO" ];
echo "</div></td>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "HORA_FIN" ];
      $hfin=$row [ "HORA_FIN" ];
echo "</div></td>";
echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "FECHA" ];
      $fech=$row [ "FECHA" ];
echo "</div></td>";

echo "<td width='150' height='10'><br><br><br> <div style='text-transform: uppercase;position:relative;width:150;height:60; overflow:auto'>";
 echo $row [ "TEXTO" ];
      $tex=$row [ "TEXTO" ];
echo "</div></td>";

echo "<td width='200' height='10'><br><br><br><div style='text-transform: uppercase;position:relative;width:150;height:50; overflow:auto'> ";
 echo $row [ "PIEZAS" ];
      $pie=$row [ "PIEZAS" ];
echo "</div></td>";

echo "<td><div style='text-transform: uppercase'>";
 echo $row [ "NUM_SERVICIO" ];
	  $ser=$row [ "NUM_SERVICIO" ];

echo "</div></td>";
echo "<td>";

?>
<form action="formulariomodificar.php" method="POST">
<input class="mayusculas" type="hidden" name="cli" value="<?PHP echo $cli ?>">
<input class="mayusculas" type="hidden" name="con" value="<?PHP echo $con ?>">
<input class="mayusculas" type="hidden" name="tec" value="<?PHP echo $tec ?>">
<input class="mayusculas" type="hidden" name="sop" value="<?PHP echo $sop ?>">
<input class="mayusculas" type="hidden" name="hini" value="<?PHP echo $hini ?>">
<input class="mayusculas" type="hidden" name="hfin" value="<?PHP echo $hfin ?>">
<input class="mayusculas" type="hidden" name="fech" value="<?PHP echo $fech ?>">
<input class="mayusculas" type="hidden" name="tex" value="<?PHP echo $tex ?>">
<input class="mayusculas" type="hidden" name="pie" value="<?PHP echo $pie ?>">
<input class="mayusculas" type="hidden" name="ser" value="<?PHP echo $ser ?>">
<input class="mayusculas" type="submit" value=""/>
 <!--<input type="button" value="" onClick="window.location.href='formulariomodificar.html'">-->
</form>
 <?php 
echo "</td>";

}

?>
</tr>

</div>
</table>

</div>
<!--cerrar comun-->
<?php #Cerramos la conexión con la base de datos
mysqli_close($conexion);
?>
</body>
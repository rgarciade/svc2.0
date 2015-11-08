<! Doctipe html>

<body{width:40%;margin:auto;min-width:400px;max-width:1000px}>
<div name="comun">
<!--refresco cada x tiempo-->

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="css/indexcss.css" rel="stylesheet" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script language="javascript" src="js/jquery.js"></script>

<STYLE>
body { margin-top: -4px; margin-right: 0px; margin-bottom: 1px; margin-left: -10px }
</STYLE>
<div name="formula predictiva">
<?php #busqueda predictiva
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$con = "select cliente from clientes";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysqli_query($conexion,$con);
	?>
    
    <script type="text/javascript">
	function abrirVentana(url) {

    window.open(url, "nuevo", "directories=no,location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=200");
	
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
   <li ><a href='index.PHP'><span>STECNICO</span></a></li>
   <li><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
   <li class='last'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
   
  
   <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
   <li class='active'><a  href='#' ><span>SERVICIOSACTIVOS</span></a></li>

 <a href='SERVICIOSACTIVOS.php'><img  src='images/srvactivos/<?PHP echo $srva?>.png' width='120px' height='50px'></a>

</ul>
</div>
<!--cerrar cssmenu-->
</div>
<!--cerrar cabecera-->
</div>
<!--cerar comun-->

<!--ZONA INFERIOR-->




   <!--BUCLE TABLA-->
<?PHP

# ################################### #
			


						##############################
						#Efectuamos la consulta SQL####
						#############################
			$result = mysqli_query ($conexion,"SELECT * FROM servicios where Estado is not NULL order by NUM_SERVICIO DESC LIMIT 15")
			or die("Error en la consulta SQL");

						###################################
						#Mostramos los resultados obtenidos
						###################################
?>					

<?PHP				
while( $row = mysqli_fetch_array ( $result )) {

	
$row [ "NUM_SERVICIO" ];
 $a=$row [ "NUM_SERVICIO" ];

    $cli=$row [ "N_CLIENTE" ];

     $con=$row [ "CONTACTOS" ];

      $tec=$row [ "TECNICO" ];
 
      $sop=$row [ "SOPORTE" ];

      $hini=$row [ "HORA_INICIO" ];

      $hfin=$row [ "HORA_FIN" ];
 
      $fech=$row [ "FECHA" ];


      $tex=$row [ "TEXTO" ];
   $inci=$row [ "Incidencia" ];

      $pie=$row [ "PIEZAS" ];

	  $ser=$row [ "NUM_SERVICIO" ];

?>
 <!--cada tabla y formulario independiente-->
 
<div class="CSSTableGenerator" >
<table style="width: 100%" border=1 >


<tr>
  <td >N_CLIENTE</td>  
  <td >CONTACTOS</td>
  <td >TECNICO</td>  
  <td >SOPORTE</td>
  <td >HORA_INI</td>  
  
   
</tr>


<tr>
<form action="FINALIZARSERVICIO.php" method="post">



 <td><div style="text-transform: uppercase"><input id="tags"  name="N_CLIENTE" value="<?PHP echo $cli ?>" class="mayusculas" required/></div></td>
 <td><div  style="text-transform: uppercase"><input type="text" name="CONTACTOS" value="<?PHP echo $con?>" class="mayusculas"/></div></td>
<!--IMPUT TECNICO-->  


 <td><select name='N_TECNICO' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
													<option></option>
													<option>JORGE</option> 
													<option>DAVID</option>
													<option>RAUL</option>
													<option>JOSE</option>
																							 
													  
													
													</select>
													</td>
<!--select soporte--> 
<?php 

 if ($sop == 'PRESENCIAL') {
ECHO "<td><select name='SOPORTE' value='' pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
  
  <option>PRESENCIAL</option>
  <option>REMOTO</optcion>
  
  </select>
   </td>";
 }ELSE{    if ($sop == 'REMOTO') {
			ECHO "<td><select name='SOPORTE' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
					<option>REMOTO</optcion>
					<option>PRESENCIAL</option>
					
					
					</select>
					</td>";
 
	}ELSE{				
					
						ECHO "<td><select name='SOPORTE' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
							<option></option>
							<option>REMOTO</optcion>
							<option>PRESENCIAL</option>
					
							
							</select>
							</td>";
	
		}}	
 ?>  
 
  <td><input type="TEXT" name="HORA_INICIO" value="<?PHP echo $hini?>"/></td>
  </tr><tr>
  <td >HORA_FIN</td>
  <td >FECHA</Td>
  <td ></td>  
  <td >PIEZAS</td>
  <td >N_SERVICIO</td>
  </tr>
  <td><input type="TEXT" name="HORA_FIN" value="<?php echo date('H:i');?>"/></td>
  <td><input type="date" name="FECHA" value="<?PHP echo $fech?>"/></td>
  <td></td>
  <td><div style="text-transform: uppercase"><input type="text" name="PIEZAS" value="<?PHP echo $pie?>" class="mayusculas"/></div></td>
  
  <td><input type="text" name="" value="<?PHP echo $ser?>"/></td>
  
  <input type="hidden" name="NUM_SERVICIO" value="<?PHP echo $ser?>">
 </tr>
  <tr>
 <td colspan="2"><h3>Incidencia</h3></td>
 <td></td>
 <td colspan="3"><h3>Texto</h3></td>
 </tr>
 <tr>
 <td colspan="2" ><div style="text-transform: uppercase"><input type="text" name="Incidencia" value="<?PHP echo $inci?>" class="mayusculas"/></div></td>
 <td></td>
 <td colspan="3"><div style="text-transform: uppercase"><input type="text" name="TEXTO" value="<?PHP echo $tex?>" class="mayusculas" required/></div> </td>
 </tr>
 <tr>
 
 <td align="center" colspan="6"> <input  type="submit" value="finalizar"/></td>
 
</form>
</tr>
</div>


</table>
 <?php 
 ##fin del wile
}

?>
</div>




</div>
<!--cerrar comun-->
<?php #Cerramos la conexión con la base de datos
mysqli_close($conexion);
?>
</body>
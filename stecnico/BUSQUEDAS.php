
<div name="comun">
<!--refresco cada x tiempo-->
<meta http-equiv="refresh" content="60">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="indexcss.css" rel="stylesheet" />
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
   <li ><a href='index.PHP'><span>STECNICO</span></a></li>
   <li><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
   <li class='active'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
   
  
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

<div class="CSSTableGenerator" >
<table style="table-layout: fixed; width: 100%">

  <tr >
    <td  colspan="5" style="table-layout: fixed; width:100% ;height:5%";>BUSCAR</td>
  </tr>
  <tr>
     
  
    <td colspan="5" rowspan="3">
	<form action="FORMULASBUSQUEDAS.php" method="post" name="formulario1">
	<?PHP  if( !isset($_GET['as'])){ echo "<img src='images/buscar.jpg' width='10%' height='40%'>";
	}else{echo "<img src='images/ERRORES/ERROR3.jpg' width='5%' height='25%'><div style='color:#00FF00;'><H2>NO SE ENCONTRARON SERVICIOS</H2></div>";}?></BR></BR></BR></BR>
	<H1>CLIENTE___FECHA INICIO___FECHA FIN___TECNICO__________CAMPO&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</H1></BR>
	<input  id="tags" name="N_CLIENTE"/ class="mayusculas"">
	<input type="date" name="FECHA1" value="<?php echo date('Y-m-d'); ?>" />
    <input type="date" name="FECHA2" value="<?php echo date('Y-m-d'); ?>" />
<select name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|">
   <option></option>
  <option>JORGE</option>
  <option>DAVID</option>
  <option>RAUL</option>
  <option>JOSE</option>
  </select>	
  
  <select name="SBUSCAR" sice=""">
  <option>CLI</option>
   <option>CLI_FECHA</option>
   <option>CLI_TECNICO</option>
  <option>CLI_FECHA_TECNICO</option>
  <option>TODOS</option>
  <option>TODOS_FECHA</option>
  <option>TODOS_TECNICO</option>
  <option>TODOS_FECHA_TECNICO</option> 
 <option>IMPRIMIR</option>
  </select>	
	
	 <input type="submit" name="enviar"value="BUSCAR" />
	 
					 </form>
  
  </TD>
  
  
  </tr>
  </tr>
</table>
	</DIV>
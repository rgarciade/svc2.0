<div name="comun">
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
<script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
<link type="text/css" href="indexcss.css" rel="stylesheet" />
<link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />

<script language="javascript" src="js/jquery.js"></script>

<div name="formula predictiva">
<?php #busqueda predictiva
include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

$con = "select cliente from clientes";//consulta para seleccionar las palabras a buscar, esto va a depender de su base de datos
$query = mysqli_query ($conexion,$con);
	?>
    <script>
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

<?php
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
			

			
?>
 <script language="JavaScript">
function newPage(url){
window.open(url,"","algun parametro que desees");
}
</script>



</div>
</div>

<div class="CSSTableGenerator1" >
<table style="width: 785px">
<!--formulario nuevo servicio-->
<?PHP #variables en blanco
$noex="";

if( isset($_GET['as']))
{
$as1="EL CLIENTE NO EXISTE";

}else{
$as1="";}


?>
<form action="crearservicio.php" method="post">
<tr><td align="center" colspan="6">Servicio Activo</td></tr>

<!--primera linea-->
<tr>
<td><h3>Nombre</td>
<td><br><input  id="tags" name="N_CLIENTE"  class="mayusculas" required>
		<div nombre="nuevo">	<br><?PHP echo $as1;?></div>	</td>
		

<td><h3>Soporte</td>
<td><select class="mayusculas" name="SOPORTE"pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
  <option></option>
  <option>PRESENCIAL</option>
  <option>REMOTO</optcion>
  </select>
   
   </tr>
   <tr>
    </tr>
   <tr>


<td><h3>Contacto</td>

<td> <br><input type="text" name="CONTACTOS"  class="mayusculas" required/><br><br></td>

<td><h3>Incidencia</td>
  <td><input class="mayusculas" type="text" name="INCIDENCIA"  required/></td>
  <tr></tr>

  <input class="mayusculas" type="hidden" name="HORA_INICIO" value="<?php echo date('H:i'); ?>"/>
    <input class="mayusculas" type="hidden" name="FECHA" value="<?php echo date('Y-m-d'); ?>" />
<input class="mayusculas" type="hidden" name="srv" value="1">
<td  align="center" colspan="6"><input class="mayusculas" type="submit" value="insertar"/></td>
</tr>
</form>
</table>
	</DIV>
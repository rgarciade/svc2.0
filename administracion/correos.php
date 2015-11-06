<!--actualmente implementando la variable panterior para que al pinchar en una imagen del menu
se mande la variable panterior a la nueva pagina
y asi en la nueva pagina saber cual fue la pagina anterior-->
<div name="comun">
<!--refresco cada x tiempo-->
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

<?PHP 


if( isset($_GET['panterior']))
{
$panterior=$_GET['panterior'];

}else{
$panterior="panel.php";}
?>

</script>

<div name="cabecera">

<div id='cssmenu'>
<ul>

       <a href='panel.php'><img  src='images/house204.png' width='45px' height='45px'></a>    
    <a href='config.php'><img  src='images/hammer2.png' width='45px' height='45px'></a>
    <a href='grupos.php'><img  src='images/multiple25.png' width='45px' height='45px'></a>
    <a href='correos.php'><img  src='images/new100.png' width='45px' height='45px'></a>
    <a href='servidor.php'><img  src='images/hosting.png' width='45px' height='45px'></a>
    <a href='<?PHP echo $panterior?>'><img  src='images/geometry56.png' width='45px' height='45px'></a>

</ul>
</div>
<!--cerrar cssmenu-->
</div>
<!--cerrar cabecera-->
</div>
<!--cerar comun-->

<div class="CSSTableGenerator" >
	</DIV>
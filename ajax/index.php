<?php 
include "../config/conexion.php";
include "jsajax/selectuser.php";
              $FILASINDEX = 4;
        	/*		$result = mysqli_query ($conexion,"SELECT * FROM servicios order by NUM_SERVICIO DESC LIMIT $FILASINDEX")
        			or die("Error en la consulta SQL");*/
       $consulta = "SELECT * FROM servicios order by NUM_SERVICIO DESC LIMIT $FILASINDEX";
			$result = mysqli_query($conexion, $consulta);


 ?>
<!DOCTYPE html>
<html>
 	<script type="text/javascript" src="jsajax/jquery-3.1.1.min.js"></script>
 	<script type="text/javascript" src="jsajax/creartabla.js"></script>
 	<script type="text/javascript" src="jsajax/creartabla.js"></script>
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--owesomecomplete-->
	<link rel="stylesheet" type="text/css" href="awesomplete-gh-pages/awesomplete.css" >
	<script src="awesomplete-gh-pages/awesomplete.min.js"></script>

 <div class="formulario" >
		<script>var array1 = ["cli", "con", "tec", "sop", "hini", "hfin","fech","tex","pie","ser"];</script>
	<form method="post" action="conectar.php">
		<div id="estado">esperando</div></br>	
		<label>nombre:</label></br>
		<input type="text" class="awesomplete" name="nombre" id="nombre" size="40" data-l></br>
<script>
		var elemento = document.getElementById('nombre');
		console.log(arrayusersJS);
		new Awesomplete(elemento,{
			list: arrayusersJS
		});
</script>


		<label>texto:</label></br>
		<input type="text" name="texto" id="texto" size="40"></br>

		<input type="button" value="insertar" onclick="enviarDatos(array1)"></br>
	</form>
 	<table id="tabla">
 		<tr >
 			<td>Usuario</td>
 			<td>texto</td>
 			<td></td>

 		</tr>

 		<?php  

 		 while( $row = mysqli_fetch_array ( $result )) {
  ?>
 		 <tr >
 			<td><?php echo $row [ "N_CLIENTE" ];?></td>
 			<td><?php echo $row [ "TEXTO" ];?></td>
 		</tr>
<?php }?>
 		
 	</table>




</body>
</html>

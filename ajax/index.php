<?php 
include "../config/conexion.php";
              $FILASINDEX = 4;
        			$result = mysqli_query ($conexion,"SELECT * FROM servicios order by NUM_SERVICIO DESC LIMIT $FILASINDEX")
        			or die("Error en la consulta SQL");
 ?>
<!DOCTYPE html>
<html>

 	<script type="text/javascript" src="js/jquery-3.1.1.min.js"></script>
<body>

<script >
function creartd(variable,variable2,id){

    var table = document.getElementById("tabla");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = variable;
    cell2.innerHTML = variable2;
}
	function enviarDatos(){
		var nombre = document.getElementById('nombre').value;
		var texto = document.getElementById('texto').value;

		$.ajax({
			type:'POST',
			url:'conectar.php',
			data:('nombre='+nombre+'&texto='+texto),
			success:function(respuesta) {
				if (respuesta==200) {
					$('#estado').html('enviadoo');
					
					creartd(nombre,texto,"tabla");
					

				}else{
					$('#estado').html('error');
				}
			}
			
		});
	};

</script>


 <div class="formulario" >
	<form method="post" action="conectar.php">
		<div id="estado">esperando</div></br>	
		<label>nombre:</label></br>
		<input type="text" name="nombre" id="nombre" size="40"></br>
		<label>texto:</label></br>
		<input type="text" name="texto" id="texto" size="40"></br>
		<input type="button" value="insertar" onclick="enviarDatos()"></br>
	</form>
 	<table id="tabla">
 		<tr >
 			<td>Usuario</td>
 			<td>texto</td>

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

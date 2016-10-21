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
function creartd(variable,variable2,nboton){


    var table = document.getElementById("tabla");
    var row = table.insertRow(1);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    var cell3 = row.insertCell(2);
    

    cell1.innerHTML = variable;
    cell2.innerHTML = variable2;

    var x =document.createElement("BUTTON");
    	x.setAttribute("id", nboton);
      cell3.appendChild(x);


}
function crearinput(form,nombre){

	  var  inputt = document.createElement("INPUT");
     inputt.setAttribute("type", "hidden");
     inputt.setAttribute("name", nombre);
     inputt.setAttribute("value", nombre);


    document.getElementById("formularioboton").appendChild(inputt);
}

function crearformulario(array){

    var form = document.createElement("FORM");
    form.setAttribute("id", "formularioboton");
    form.setAttribute("method", "post");

    document.body.appendChild(form);

    for(let i=0; i<array.length; i++){
    	crearinput(form,array[i]);
    }

}

	function enviarDatos(){
		var nombre = document.getElementById('nombre').value;
		var texto = document.getElementById('texto').value;
		var nombreboton = 0;

		$.ajax({
			type:'POST',
			url:'conectar.php',
			data:('nombre='+nombre+'&texto='+texto),
			success:function(respuesta) {
				if (respuesta==200) {
					$('#estado').html('enviadoo');
					
					creartd(nombre,texto,"boton"+nombreboton);
					var array1 = ["cli", "con", "tec", "sop", "hini", "hfin","fech","tex","pie","ser"];
					crearformulario(array1);
					nombreboton+;

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

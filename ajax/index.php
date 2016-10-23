<?php 
include "../config/conexion.php";
include "jsajax/selectuser.php";
include "funciones/funciones.php";
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
 	<link type="text/css" href="css/index.css" rel="stylesheet" />
<!-- Latest compiled and minified CSS -->

<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<!--owesomecomplete-->
	<link rel="stylesheet" type="text/css" href="awesomplete-gh-pages/awesomplete.css" >
	<script src="awesomplete-gh-pages/awesomplete.js"></script>
<!--
 <div class="formulario" >
		
	<form method="post" action="conectar.php">
		<div id="estado">esperando</div></br>	
		<label>nombre:</label></br>
		<input type="text" class="awesomplete" name="nombre" id="nombretop" size="40" data-l></br>
			<script>
					var elemento = document.getElementById('nombretop');
					console.log(arrayusersJS);
					new Awesomplete(elemento,{
						list: arrayusersJS
					});
			</script>


		<label>texto:</label></br>
		<input type="text" name="texto" id="textotop" size="40"></br>
				<script>
			var arrayformnombrestop = ['nombretop','textotop'];
			
		</script>
		<input type="button" value="insertar" onclick="enviarDatos(arrayformnombrestop,array1)"></br>
	</form>
////////////////////////
-->

<div class="FormurarioIndex">


  <form action="crearservicio.php" method="post" name="formulario1" id="formulario1" class="form-group">

     
      <h2 style="text-align:center">Formulario de Servicios</h2>
    <div class="row FormurarioIndex">


      <div class="col-md-3">Nombre<br>

        <input  class="form-control " id="nombre" name="nombre"  class="mayusculas" required>
        			<script>
					var elemento = document.getElementById('nombre');
					
					new Awesomplete(elemento,{
						list: arrayusersJS,

					});
			</script>

        <br> 
      </div>
      <div class=" col-md-3">Soporte<br>
        <select class="form-control mayusculas" name="SOPORTE" id ="soporte" pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
          <option></option>
          <option>PRESENCIAL</option>
          <option>REMOTO</optcion>
        </select>
      </div>
      <div class=" col-md-3">Fecha <br><input  class="form-control" class="mayusculas" type="date" name="FECHA"  id ="fecha"  value="<?php echo date('Y-m-d'); ?>" /></div>
      <div class=" col-md-3">Contacto <br>
       
        <input  class="form-control" type="text" name="CONTACTOS"   id ="contactos" class="mayusculas"/>
      
      </div>
    </div> 
    <div class="row">
      <div class=" col-md-3">Hora Inicio<br>
      
        <input  class="form-control" class="mayusculas" type="datetime" name="HORA_INICIO"  id ="horainicio" value="<?php echo date('H:i'); ?>"/>
     
      </div>
      <div class=" col-md-3">Hora Fin<br>
        
        <input   class="form-control"class="mayusculas" type="datetime" name="HORA_FIN"  id ="horafin" value="<?php echo date('H:i'); ?>" />
      
      </div>
      <div class=" col-md-3">Piezas <br><input  class="form-control"class="mayusculas" type="text" name="PIEZAS"  id ="piezas"  /></div>
      <?php mostrar_select($arr_Tecnicos_orig,"Tecnico",3);?>
      </div>  
      <div class=" col-md-12"><h4 style="text-align:center">Anotaciones</h4> <br><textarea class="form-control mayusculas" type="text" name="texto" id="texto" ></textarea></div>
     

    </div>
		<script>
		 	const array1 = ["cli", "con", "tec", "sop", "hini", "hfin","fech","tex","pie","ser"];
			const arrayformnombress = ['nombre','contactos','Tecnico','soporte', 'horainicio','horafin','fecha','texto', 'piezas'];

			function enviar_formulario(){ 
				document.formulario1.submit() 
			}
		</script>
      <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="button" value="insertar" onclick="nservicio =enviarDatos(arrayformnombress,'formulario1',array1,nservicio)"/></div>

    </div>
  </form>
</div>
</br>


<div class="table-responsive" >
       <table class="table table-striped"style="width: 100%" id="tablabot" >
        <tr colspan="5"  class="info"style="table-layout: fixed; width:100% ;height:2%";>
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
          <td></td>
        </tr>
       	<script> var control_tabla = true;</script>
        <?PHP			
        
        while( $row = mysqli_fetch_array ( $result )) {
        	$row [ "NUM_SERVICIO" ];
        	$a=$row [ "NUM_SERVICIO" ];
        echo "<tr>";

              $cli  = Element_tabla($row,"N_CLIENTE");

              $con  = Element_tabla($row,"CONTACTOS");

              $tec  = Element_tabla($row,"TECNICO");

              $sop  = Element_tabla($row,"SOPORTE");

              $hini = Element_tabla($row,"HORA_INICIO");

              $hfin = Element_tabla($row,"HORA_FIN");

              $fech = Element_tabla($row,"FECHA");

              $tex  = Element_tabla($row,"TEXTO");

              $pie  = Element_tabla($row,"PIEZAS");

              $ser  = Element_tabla($row,"NUM_SERVICIO");

              $estado  = Element_tabla($row,"Estado");

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
              <input class="mayusculas" type="hidden" name="estado" value="<?PHP echo $estado ?>">
             
              <button class="mayusculas btn btn-success glyphicon glyphicon-pencil"  type="submit" value=""></input>    
            </form>

                    <script>
                    if (control_tabla) {
	                    var nservicio=<?php echo $ser;?>;
	                    control_tabla = false;
                    }

                    </script>
           <?php 
          echo "</td>";
        }?>

        
        </tr>

    </table>

</div>

</body>
</html>

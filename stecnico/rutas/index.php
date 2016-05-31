
<meta http-equiv="refresh" content="60">
<?php include("../funciones/comun.php");
      include("../funciones/funciones.php");
      Menu("index",$srva);
?>
<div name="formula predictiva">
      <?php 
   #busqueda predictiva
      include("../funciones/conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

        //arrays

      $arr_Tecnicos_orig = array("RAUL", "JORGE", "DAVID", "JOSE","");
      $arr_sop = array("PRESENCIAL","REMOTO");  

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
                  var availableTagss=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
                      
                  $( "#tagss" ).autocomplete({
                    source: availableTagss
                  });
                  
                });
          </script>
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

    

<div class="FormurarioIndex">


<form action="crearservicio.php" method="post" class="form-group">

   
    <h2 style="text-align:center">Formulario de Servicios</h2>
  <div class="row FormurarioIndex">


    <div class=" col-md-3">Nombre<br>
      <input  class="form-control" id="tagss" name="N_CLIENTE"  class="mayusculas" required>
      <br><?PHP echo $error;?> 
    </div>
    <div class=" col-md-3">Soporte<br>
      <select class="form-control mayusculas" name="SOPORTE"pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
        <option></option>
        <option>PRESENCIAL</option>
        <option>REMOTO</optcion>
      </select>
    </div>
    <div class=" col-md-3">Fecha <br><input  class="form-control" class="mayusculas" type="date" name="FECHA" value="<?php echo date('Y-m-d'); ?>" /></div>
    <div class=" col-md-3">Contacto <br>
      <input  class="form-control" type="text" name="CONTACTOS"  class="mayusculas"/>
    </div>
  </div> 
  <div class="row">
    <div class=" col-md-3">Hora Inicio<br>
      <input  class="form-control" class="mayusculas" type="datetime" name="HORA_INICIO" value="<?php echo date('H:i'); ?>"/>
    </div>
    <div class=" col-md-3">Hora Fin<br>
      <input   class="form-control"class="mayusculas" type="datetime" name="HORA_FIN" value="<?php echo date('H:i'); ?>" />
    </div>
    <div class=" col-md-3">Piezas <br><input  class="form-control"class="mayusculas" type="text" name="PIEZAS"  /></div>
    <div class=" col-md-3">Tecnico <br>
      <select class="form-control mayusculas" name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
        <option></option>
        <option>JORGE</option>
        <option>DAVID</option>
        <option>RAUL</option>
        <option>JOSE</option>
      </select>
    </div>  
    <div class=" col-md-12"><h4 style="text-align:center">Anotaciones</h4> <br><textarea class="form-control mayusculas" type="text" name="TEXTO"  ></textarea></div>
   

  </div>

    <div style="text-align:center"><br><input  class="mayusculas btn btn-primary " type="submit" value="insertar"/></div>

  </div>
</form>
</div>
<div>
</br>

    <div class="table-responsive" >
       <table class="table table-striped"style="width: 100%" >
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
        </tr>

           <!--BUCLE TABLA-->
       
        <?PHP
     					    	##############################
        						#Efectuamos la consulta SQL####
        						#############################
        			$result = mysqli_query ($conexion,"SELECT * FROM servicios order by NUM_SERVICIO DESC LIMIT 20")
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
             
              <button class="mayusculas btn btn-success "  type="submit" value=""><i class="glyphicon glyphicon-pencil"></i></input>    
            </form>
           <?php 
          echo "</td>";
        }
        ?>
        </tr>

    </table>

</div>
<!--cerrar comun-->
<?php #Cerramos la conexión con la base de datos
mysqli_close($conexion);

?> 
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>--!>
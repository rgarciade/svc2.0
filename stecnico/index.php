<body>
<meta http-equiv="refresh" content="60">
<?php include("funciones/comun.php");
      include("funciones/funciones.php");
      Menu("index",$srva);
?>
      
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
          <td> <select class="mayusculas" name="N_TECNICO" sice=""pattern="|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|"required>
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
        <tr>
          <td  align="center" colspan="6"><input class="mayusculas" type="submit" value="insertar"/></td></tr>
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
              <input class="mayusculas" type="submit" value=""/>    
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
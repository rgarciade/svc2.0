   <?php

    include("../funciones/comun.php");
    include("conexion.php");//se incluyen los datos para realizar la conexion a su base de datos

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
                  var availableTags=new Array(<?php echo $arreglo; ?>);//imprime el arreglo dentro de un array de javascript
                      
                  $( "#tags" ).autocomplete({
                    source: availableTags
                  });
                  
                });
          </script>



<a href="#modal1">DESLIZAaaaR</a>
	<div id="modal1" class="modalmask">
	    <div class="modalbox movedown">
	        <a href="#close" title="Close" class="close">X</a>


<div >
<a href='#close' title='Close' class='close'>X</a>
  <table style='width:100%'>
    
    <form action='crearservicio.php' method='post'>
      <tr>
        <td align='center' colspan='6'>Servicio Activo</td>
      </tr>

      <!--primera linea-->
      <tr>
        <td><h3>Nombre</td>
        <td>
          <br><input  id='tags' name='N_CLIENTE'  class='mayusculas' required>
          <div nombre='nuevo'>  
            <br>
          </div>  
        </td>
          

        <td>
          <h3>Soporte<h3>
        </td>
        <td>
          <select class='mayusculas' name='SOPORTE'pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>
            <option></option>
            <option>PRESENCIAL</option>
            <option>REMOTO</optcion>
            </select>
        </td>
        </tr>
        <tr>

        </tr>
        <tr>


        <td><h3>Contacto</td>

        <td> <br><input type='text' name='CONTACTOS'  class='mayusculas' required/><br><br></td>

        <td><h3>Incidencia</td>
        <td><input class='mayusculas' type='text' name='INCIDENCIA'  required/></td>
        <tr>
          
        </tr>

            <input class='mayusculas' type='hidden' name='HORA_INICIO' value='echo date('H:i'); '/>
            <input class='mayusculas' type='hidden' name='FECHA' value=' echo date('Y-m-d'); ' />
          <input class='mayusculas' type='hidden' name='srv' value='1'>
        <td  align='center' colspan='6'><input class='mayusculas' type='submit' value='insertar'/></td>
      </tr>
    </form>
  </table>
  </DIV>


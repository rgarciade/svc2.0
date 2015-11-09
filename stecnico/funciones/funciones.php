 <script language="javascript" src="js/jquery.js"></script>

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
      	
//funcion tabla
             function Element_tabla($row,$act){
              echo "<td><div style='text-transform: uppercase'>";
              echo $row [ "$act" ];
                $ret=$row [ "$act" ];
              echo "</div></td>";
            return $ret;
            } 	
//funciones (formulario modificar)
  function Reorg_arr($ori,$arr,$length){
    
    $contador    = 0;
    $controlador = 0;
    $arrfin         = array(); 
    for ($i=0; $i < $length ; $i++) { 
        if ($arr[$i] == $ori && $controlador == 0) {
          $iaux = $i;
          $i = $length;
      } 

    }
    for ($z=0; $z < $length ; $z ++) { 
        
        $arrfin[$z] = $arr[$iaux] ;
        $iaux ++;
        if ($iaux == $length) {
          $iaux = 0;
        }
    } 
    return $arrfin;
  };
  function mostrar_select($arr,$name){
            echo "<td><select name='$name' sice='' value=''pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>";
                  $count= 0;
                  foreach ($arr as $key => $value) {
                        option($value,$count);
                        $count++;
                  }
            echo "    </select>
                </td>";
            }
  function option($value,$count){
      if ($value != "") echo "<option>$value</option>";
        elseif ($count == 0) echo "<option></option>";
  }

 function Menu($page,$srva){

  
    echo  "<div id='cssmenu'>
      <ul>";
         activ($page,"index");   echo "<a href='index.PHP'><span>STECNICO</span></a></li>";
         activ($page,"clientes");   echo "<a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>";
         activ($page,"busquedas");   echo "<a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>";
         activ($page,"servicios2.0");   echo "<a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>";
         activ($page,"servicioactivo");   echo "<a  href='#' onClick='abrirVentana('CREARSERVACTIVO.PHP')'><span>NUEVO SERV ACTIVO</span></a></li>";
    echo "<a href='SERVICIOSACTIVOS.php'><img  src='images/srvactivos/"; echo $srva;  echo ".png' width='120px' height='50px'></a>
      </ul>";
}
 function activ($page,$href){
  if ($page == $href) {
    echo "<li class='active'>";
  }else{
    echo "<li>";  
  }

  
}



       ?>

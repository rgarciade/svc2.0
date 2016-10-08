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
  if($act == "Estado"){ 
    echo "<td style='color: red'>"; 
  }else{
    echo "<td>";
  } 
  echo "<div style='text-transform: uppercase'>";
  echo $row [ "$act" ];
  $ret=$row [ "$act" ];
  echo "</div></td>";
  return $ret;
} 	
function activ($page,$href){
  if ($page == $href) {
    echo "<li class='active'>";
  }else{
    echo "<li>";  
  }
}
//funciones (formulario modificar)
function espacios($numero){
  for ($i=0; $i < $numero; $i++) { 
    echo "&nbsp;";
  }
  
}
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
function mostrar_select($arr,$name,$tamaño){
    echo "<div class=' col-md-$tamaño'>$name<br>
           <select class='form-control' class='mayusculas' name='$name'pattern='|^[a-z A-ZñÑáéíóúÁÉÍÓÚüÜ]*$|'required>";
        $count= 0;
        foreach ($arr as $key => $value) {
              option($value,$count);
              $count++;
        }
    echo"   </select>
          </div>";
}
function option($value,$count){
    if ($value != "") echo "<option>$value</option>";
      elseif ($count == 0) echo "<option></option>";
}

function mostrarerror(){

          echo "<div style='text-align:center'>
                  <img src='../images/ERRORES/ERROR3.jpg' width='5%' height='25%'><div style='color:#00FF00;'>
                    <H2>NO SE ENCONTRARON SERVICIOS</H2>
                <div style='text-align:center'>
                  <br><a href='../rutas/busquedas.PHP'>
                  <button class='mayusculas btn btn-primary glyphicon glyphicon-triangle-left' type='submit' >
                    &#8195&#8195Volver&#8195&#8195
                  </button></a>
                </div>
                </div>";
        
}

function Menu($page,$srva){

  echo "<div  class='navbar navbar-default navbar-inverse navbar-fixed-top-' role='navigation'>
          <div class='container'>
            <div class='navbar-header'>
              
            </div>
            <div>
            <ul class='nav navbar-nav navbar-inverse navbar-left'> ";
              activ($page,"index");   echo "<a href='../rutas/index.PHP'><span>Administracion</span></a></li>";
              if (LOGIN === true  && NIVEL == 1 ){
                activ($page,"usuarios");   echo "<a href='../rutas/usuarios.PHP'><span>usuarios</span></a></li>";
              }  

      echo "</ul>";
      echo "<ul class='nav navbar-nav navbar-right'> ";
        echo "<li><a  href='../../stecnico/rutas/'><span>volver stecnico</span></a></li>"; 
      echo "</ul>
      
            </div>
        </div></div>
    ";
}

if (LOGIN === true){
  if(isset($_COOKIE['ms'])){
   session_id($_COOKIE['ms']);
  }
        ###
        ##  acontinuacion comprueva si existe la sesion
        ### 
  session_start();
  if(isset($_SESSION['usuario']) and $_SESSION['estado'] == 'valido'  ){ 
    define('NIVEL',$_SESSION['nivel']);
  }else{   
    ###
    ##  si la sesion no existe se redirige a la pagina login
    ### 

    // Usuario que no se ha logueado 
    header('location:../../index.php');     
  } 
}else{
   define('NIVEL','0');
}

?>

  
<?php
include("../funciones/comun.php");
include("../funciones/funciones.php");
      Menu("",$srva);
      $error = false;

  if (isset($_GET['usu'])) {
   $usu=$_GET['usu'];
  }else{
   $usu="";
  }
  if (isset($_GET['fe1'])) {
   $fe1=$_GET['fe1'];
  }else{
   $fe1="";
  }
  if (isset($_GET['fe2'])) {
   $fe2=$_GET['fe2'];
  }else{
   $fe2="";
  }
  if (isset($_GET['tec'])) {
   $tec=$_GET['tec']; 
  }else{
   $tec="";
  }
?>
  <!--cerrar cssmenu-->
  </div>
  <!--cerrar cabecera-->
</div>
<!--cerar comun-->

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
          <td></td>
        </tr>



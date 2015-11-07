<div name="comun">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <script language="JavaScript" src="../js/jquery-1.5.1.min.js"></script>
  <script language="JavaScript" src="../js/jquery-ui-1.8.13.custom.min.js"></script>
  <link type="text/css" href="../css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
  <script language="javascript" src="../js/jquery.js"></script>
  <link type="text/css" href="../indexcss.css" rel="stylesheet" />

  <div id='cssmenu'>
    <ul>
       <li ><a href='../index.PHP'><span>STECNICO</span></a></li>
       <li ><a href='../../CLIENTES.PHP'><span>CLIENTE</span></a></li>
       <li class='last'><a href='../BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
       <li class='vol'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
       <li class='vol'><a  href='.../servicios2.0'><span>MICRO-TEX</span></a></li>
    </ul>
  </div>

</div>  
<?php

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
#CONEXION

#Conectamos con mysqli
$conexion = mysqli_connect("localhost","select","123456")
or die ("Fallo en el establecimiento de la conexión");


#Seleccionamos la base de datos a utilizar
mysqli_select_db($conexion,"microtex")
or die("Error en la selección de la base de datos");


# ################################### #

 #CONSULTA		


						##############################
						#BUSCAR RANGO SQL####
						#############################

$consulta1 = mysqli_query($conexion,"SELECT * FROM `servicios` WHERE N_CLIENTE='$usu'
 AND FECHA <= '$fe2' AND FECHA>='$fe1' ORDER BY FECHA DESC,HORA_FIN DESC")
or die("Error en la consulta SQL");						
#####nªfilass
$numero_filas = mysqli_num_rows($consulta1);
 if ($numero_filas == 0 ) {
#Cerramos la conexión con la base de datos
mysqli_close($conexion);
header('location:../BUSQUEDAS.PHP?as=ERROR3');
}else{
#echo "hay registros";

ECHO "IMPRIMIRRRR";

header("location:../EXCEL2.PHP?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
}


?>
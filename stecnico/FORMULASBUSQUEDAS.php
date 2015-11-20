<div name="comun">
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <script language="JavaScript" src="js/jquery-1.5.1.min.js"></script>
  <script language="JavaScript" src="js/jquery-ui-1.8.13.custom.min.js"></script>
  <link type="text/css" href="css/ui-lightness/jquery-ui-1.8.13.custom.css" rel="stylesheet" />
  <script language="javascript" src="js/jquery.js"></script>
  <link type="text/css" href="indexcss.css" rel="stylesheet" />

<div id='cssmenu'>
  <ul>
     <li ><a href='index.PHP'><span>STECNICO</span></a></li>
     <li ><a href='CLIENTES.PHP'><span>CLIENTE</span></a></li>
     <li class='last'><a href='BUSQUEDAS.PHP'><span>BUSQUEDAS</span></a></li>
     <li class='vol'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</li>
     <li class='vol'><a  href='/servicios2.0'><span>MICRO-TEX</span></a></li>
  </ul>
</div>

</div>

<?PHP #DATOS MODIFICAR
  if( isset($_POST['SBUSCAR'])){
  $acc=$_POST['SBUSCAR'];
  }

  if (isset($_POST['N_CLIENTE'])) {
   $usu=$_POST['N_CLIENTE'];
  }else{
   $usu="";
  }
  if (isset($_POST['FECHA1'])) {
   $fe1=$_POST['FECHA1'];
  }else{
   $fe1="";
  }
  if (isset($_POST['FECHA2'])) {
   $fe2=$_POST['FECHA2'];
  }else{
   $fe2="";
  }
  if (isset($_POST['N_TECNICO'])) {
   $tec=$_POST['N_TECNICO'];
  }else{
   $tec="";
  }

$tec=$_POST['N_TECNICO'];

 
switch ($acc) {
  case "CLI_FECHA" :
    header("location:./busquedas/Cliente_Fecha.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;

  case "IMPRIMIR":  
      header("location:./busquedas/Imprimir.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "TODOS":
      header("location:./busquedas/Todos.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "TODOS_FECHA":
      header("location:./busquedas/Todos_fecha.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "TODOS_FECHA_TECNICO":
       header("location:./busquedas/Todos_fecha_tecnico.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "TODOS_TECNICO":
       header("location:./busquedas/Todos_tecnico.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "CLI_FECHA_TECNICO":
       header("location:./busquedas/Cli_fecha_tecnico.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "CLI_TECNICO":
       header("location:./busquedas/Cli_tecnico.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;
  case "CLI":
       header("location:./busquedas/Cli.php?usu=$usu&fe1=$fe1&fe2=$fe2&tec=$tec");
    break;

  }

?>

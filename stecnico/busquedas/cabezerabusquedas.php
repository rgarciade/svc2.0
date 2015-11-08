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
?>
 
<!--tabla-->
<div class="CSSTableGenerator" >
<table  border=1 >
<tr  colspan="5" style="table-layout: fixed; width:100% ;height:2%";>
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

